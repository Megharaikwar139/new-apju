            <div class="py-3 px-4 text-center text-muted border-top bg-white small mt-4" style="font-size: 0.75rem;">
                <span>Dr. A.P.J. Abdul Kalam University CMS · Developed &amp; Created by <a href="https://wecrescent.com/" target="_blank" rel="noopener noreferrer" class="fw-bold text-primary text-decoration-none">Crescent Digital Solutions <i class="fa-solid fa-arrow-up-right-from-square text-xs ms-0.5"></i></a></span>
            </div>
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

    <!-- Universal In-Page Document & Certificate Previewer Modal (Admin) -->
    <div id="pdfPreviewModal" class="pdf-preview-backdrop" role="dialog" aria-modal="true" aria-labelledby="pdfPreviewTitle">
        <div class="pdf-preview-dialog">
            <!-- Header -->
            <div class="pdf-preview-header">
                <div class="pdf-preview-info">
                    <div class="pdf-preview-icon-badge" id="pdfPreviewIconBadge">
                        <i id="pdfPreviewHeaderIcon" class="fa-solid fa-file-pdf"></i>
                    </div>
                    <div class="pdf-preview-title-group">
                        <h3 id="pdfPreviewTitle" class="pdf-preview-title">Document Preview</h3>
                        <div class="pdf-preview-meta">
                            <span id="pdfPreviewTypeBadge" class="pdf-preview-badge">PDF DOCUMENT</span>
                            <span id="pdfPreviewFilename" class="pdf-preview-filename">document.pdf</span>
                        </div>
                    </div>
                </div>

                <!-- Action Toolbar -->
                <div class="pdf-preview-actions">
                    <a id="pdfPreviewFullViewBtn" href="#" target="_blank" class="pdf-btn pdf-btn-fullview" title="Open full screen in a new tab">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        <span class="pdf-btn-text">Full Page View</span>
                    </a>
                    <a id="pdfPreviewDownloadBtn" href="#" download class="pdf-btn pdf-btn-download" title="Download this file">
                        <i class="fa-solid fa-download"></i>
                        <span class="pdf-btn-text">Download</span>
                    </a>
                    <button type="button" id="pdfPreviewCloseBtn" class="pdf-btn-close" aria-label="Close preview" title="Close (Esc)">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </div>

            <!-- Body / Viewer -->
            <div class="pdf-preview-body">
                <div id="pdfPreviewLoader" class="pdf-preview-loader">
                    <div class="pdf-preview-spinner"></div>
                    <p id="pdfPreviewLoaderText">Loading document preview...</p>
                </div>
                <iframe id="pdfPreviewFrame" class="pdf-preview-frame" src="about:blank" title="Document Preview Frame"></iframe>
                <div id="pdfPreviewImageWrap" class="pdf-preview-image-container d-none">
                    <div class="pdf-image-toolbar">
                        <button type="button" class="pdf-img-tool-btn" id="pdfZoomOutBtn" title="Zoom Out"><i class="fa-solid fa-magnifying-glass-minus"></i></button>
                        <span class="pdf-img-zoom-text" id="pdfZoomLevel">100%</span>
                        <button type="button" class="pdf-img-tool-btn" id="pdfZoomInBtn" title="Zoom In"><i class="fa-solid fa-magnifying-glass-plus"></i></button>
                        <button type="button" class="pdf-img-tool-btn" id="pdfZoomResetBtn" title="Reset Fit"><i class="fa-solid fa-compress me-1"></i>Fit</button>
                    </div>
                    <div class="pdf-image-scroll-stage">
                        <img id="pdfPreviewImg" class="pdf-preview-image" src="" alt="Preview Image">
                    </div>
                </div>
            </div>

            <!-- Fallback Footer for mobile devices -->
            <div class="pdf-preview-fallback">
                <span>Viewing on a mobile device or having issues with inline preview?</span>
                <div>
                    <a id="pdfFallbackViewLink" href="#" target="_blank" class="me-3">
                        <i class="fa-solid fa-arrow-up-right-from-square me-1"></i>Open Full Page
                    </a>
                    <a id="pdfFallbackDownloadLink" href="#" download>
                        <i class="fa-solid fa-download me-1"></i>Direct Download
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- PDF & Image Previewer Modal Script -->
    <script src="../assets/js/pdf-preview-modal.js?v=2.2"></script>
</body>
</html>
