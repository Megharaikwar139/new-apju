        </main> <!-- End Admin Content Body -->
    </div> <!-- End Admin Main Wrapper -->

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- CKEditor 5 Classic Build -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <script>
    // Universal CKEditor 5 Global Registry
    window.editors = window.editors || {};

    // Helper to safely set editor data
    window.setEditorData = function(elementId, content) {
        const el = document.getElementById(elementId);
        if (el) {
            el.value = content || '';
            if (window.editors && window.editors[elementId]) {
                window.editors[elementId].setData(content || '');
            }
        }
    };

    // Helper to safely get editor data
    window.getEditorData = function(elementId) {
        if (window.editors && window.editors[elementId]) {
            return window.editors[elementId].getData();
        }
        const el = document.getElementById(elementId);
        return el ? el.value : '';
    };

    // Intercept native HTMLTextAreaElement.value setter to automatically sync CKEditor instances
    (function() {
        const nativeValueDescriptor = Object.getOwnPropertyDescriptor(HTMLTextAreaElement.prototype, 'value');
        if (nativeValueDescriptor && nativeValueDescriptor.set) {
            const originalSet = nativeValueDescriptor.set;
            Object.defineProperty(HTMLTextAreaElement.prototype, 'value', {
                set: function(val) {
                    originalSet.call(this, val);
                    const id = this.id;
                    if (id && window.editors && window.editors[id]) {
                        try {
                            const currentData = window.editors[id].getData();
                            if (currentData !== (val || '')) {
                                window.editors[id].setData(val || '');
                            }
                        } catch (e) {
                            console.warn('CKEditor auto-sync error on #' + id, e);
                        }
                    }
                },
                get: function() {
                    const id = this.id;
                    if (id && window.editors && window.editors[id]) {
                        return window.editors[id].getData();
                    }
                    return nativeValueDescriptor.get.call(this);
                },
                configurable: true
            });
        }
    })();

    // Auto sync on Bootstrap modal show event
    document.addEventListener('show.bs.modal', function(event) {
        const modal = event.target;
        setTimeout(() => {
            modal.querySelectorAll('textarea').forEach(textarea => {
                const elId = textarea.id;
                if (elId && window.editors && window.editors[elId]) {
                    try {
                        window.editors[elId].setData(textarea.value || '');
                    } catch (err) {}
                }
            });
        }, 50);
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Target all content/rich textareas
        const richTextareas = document.querySelectorAll(
            'textarea.ckeditor, textarea.rich-editor, textarea[name="content"], textarea[name="about_content"], textarea[name="eligibility_content"], textarea[name="scope_content"], textarea[name="syllabus_content"], textarea[name="hod_message"], textarea[name="dean_message"], textarea[name="tab_content"], textarea[name="description"]'
        );

        richTextareas.forEach((textarea, index) => {
            // Ensure unique ID
            if (!textarea.id) {
                textarea.id = 'ckeditor_inst_' + (textarea.name ? textarea.name.replace(/[^a-zA-Z0-9_]/g, '_') : index);
            }
            const elId = textarea.id;

            // Skip if already initialized
            if (window.editors[elId]) return;

            ClassicEditor
                .create(textarea, {
                    toolbar: {
                        items: [
                            'heading', '|',
                            'bold', 'italic', 'underline', '|',
                            'link', 'bulletedList', 'numberedList', '|',
                            'insertTable', 'blockQuote', '|',
                            'undo', 'redo'
                        ]
                    },
                    heading: {
                        options: [
                            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                            { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                            { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' }
                        ]
                    },
                    table: {
                        contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
                    }
                })
                .then(editor => {
                    window.editors[elId] = editor;

                    // If textarea had pre-existing value in HTML, set it in editor
                    if (textarea.value && textarea.value.trim() !== '') {
                        editor.setData(textarea.value);
                    }

                    // Sync on change
                    editor.model.document.on('change:data', () => {
                        const data = editor.getData();
                        const nativeSet = Object.getOwnPropertyDescriptor(HTMLTextAreaElement.prototype, 'value')?.set;
                        if (nativeSet) {
                            nativeSet.call(textarea, data);
                        } else {
                            textarea.value = data;
                        }
                    });

                    // Sync on parent form submission
                    if (textarea.form) {
                        textarea.form.addEventListener('submit', () => {
                            const data = editor.getData();
                            const nativeSet = Object.getOwnPropertyDescriptor(HTMLTextAreaElement.prototype, 'value')?.set;
                            if (nativeSet) {
                                nativeSet.call(textarea, data);
                            } else {
                                textarea.value = data;
                            }
                        });
                    }
                })
                .catch(err => {
                    console.warn('CKEditor notice for #' + elId + ':', err);
                });
        });
    });
    </script>
</body>
</html>
