/**
 * Universal In-Page Document & Certificate Previewer Modal
 * Intercepts all PDF documents and Certificate / Official Image links
 * on Dr. APJ Abdul Kalam University website (Frontend & Admin Panel)
 * and opens them in an in-page interactive luxury modal.
 */

(function() {
    'use strict';

    let modalBackdrop = null;
    let modalDialog = null;
    let iframeEl = null;
    let imageWrapEl = null;
    let imageEl = null;
    let loaderEl = null;
    let loaderTextEl = null;
    let titleEl = null;
    let filenameEl = null;
    let typeBadgeEl = null;
    let headerIconEl = null;
    let downloadBtn = null;
    let fullViewBtn = null;
    let fallbackViewLink = null;
    let fallbackDownloadLink = null;
    let closeBtn = null;
    let zoomInBtn = null;
    let zoomOutBtn = null;
    let zoomResetBtn = null;
    let zoomLevelText = null;

    let currentZoom = 1.0;

    const PDF_EXTENSIONS = ['.pdf'];
    const IMAGE_EXTENSIONS = ['.jpg', '.jpeg', '.png', '.webp', '.gif', '.svg'];

    function initPdfModal() {
        modalBackdrop = document.getElementById('pdfPreviewModal');
        if (!modalBackdrop) return;

        modalDialog = modalBackdrop.querySelector('.pdf-preview-dialog');
        iframeEl = document.getElementById('pdfPreviewFrame');
        imageWrapEl = document.getElementById('pdfPreviewImageWrap');
        imageEl = document.getElementById('pdfPreviewImg');
        loaderEl = document.getElementById('pdfPreviewLoader');
        loaderTextEl = document.getElementById('pdfPreviewLoaderText');
        titleEl = document.getElementById('pdfPreviewTitle');
        filenameEl = document.getElementById('pdfPreviewFilename');
        typeBadgeEl = document.getElementById('pdfPreviewTypeBadge');
        headerIconEl = document.getElementById('pdfPreviewHeaderIcon');
        downloadBtn = document.getElementById('pdfPreviewDownloadBtn');
        fullViewBtn = document.getElementById('pdfPreviewFullViewBtn');
        fallbackViewLink = document.getElementById('pdfFallbackViewLink');
        fallbackDownloadLink = document.getElementById('pdfFallbackDownloadLink');
        closeBtn = document.getElementById('pdfPreviewCloseBtn');
        zoomInBtn = document.getElementById('pdfZoomInBtn');
        zoomOutBtn = document.getElementById('pdfZoomOutBtn');
        zoomResetBtn = document.getElementById('pdfZoomResetBtn');
        zoomLevelText = document.getElementById('pdfZoomLevel');

        // Close handlers
        if (closeBtn) {
            closeBtn.addEventListener('click', closePdfModal);
        }

        modalBackdrop.addEventListener('click', function(e) {
            if (e.target === modalBackdrop) {
                closePdfModal();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modalBackdrop.classList.contains('is-active')) {
                closePdfModal();
            }
        });

        // Zoom handlers
        if (zoomInBtn) {
            zoomInBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                setZoom(currentZoom + 0.25);
            });
        }

        if (zoomOutBtn) {
            zoomOutBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                setZoom(currentZoom - 0.25);
            });
        }

        if (zoomResetBtn) {
            zoomResetBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                setZoom(1.0);
            });
        }

        if (imageEl) {
            imageEl.addEventListener('click', function(e) {
                e.stopPropagation();
                if (currentZoom === 1.0) {
                    setZoom(1.6);
                } else {
                    setZoom(1.0);
                }
            });
        }

        // Global link interceptor
        document.addEventListener('click', handleGlobalMediaClicks, true);
    }

    function setZoom(zoom) {
        currentZoom = Math.min(Math.max(0.5, zoom), 3.0);
        if (imageEl) {
            imageEl.style.transform = 'scale(' + currentZoom + ')';
            imageEl.style.cursor = currentZoom === 1.0 ? 'zoom-in' : 'zoom-out';
        }
        if (zoomLevelText) {
            zoomLevelText.textContent = Math.round(currentZoom * 100) + '%';
        }
    }

    function getMediaType(href) {
        if (!href || href === '#' || href.startsWith('javascript:')) return null;
        const cleanHref = href.split('?')[0].split('#')[0].toLowerCase();
        for (let i = 0; i < PDF_EXTENSIONS.length; i++) {
            if (cleanHref.endsWith(PDF_EXTENSIONS[i])) return 'pdf';
        }
        for (let j = 0; j < IMAGE_EXTENSIONS.length; j++) {
            if (cleanHref.endsWith(IMAGE_EXTENSIONS[j])) return 'image';
        }
        return null;
    }

    function isPreviewableLink(link) {
        if (!link) return false;
        // Don't intercept modal's own actions
        if (link.closest('#pdfPreviewModal')) return false;
        if (link.dataset.noPreview === 'true' || link.classList.contains('no-preview')) return false;

        const href = (link.getAttribute('href') || '').trim();
        return getMediaType(href) !== null;
    }

    function extractTitle(link, cleanFilename, mediaType) {
        // 1. Explicit data attribute
        const explicitTitle = link.getAttribute('data-pdf-title') || link.getAttribute('data-doc-title') || link.getAttribute('data-title');
        if (explicitTitle && explicitTitle.trim().length > 2) {
            return explicitTitle.trim();
        }

        // 2. Title attribute
        const attrTitle = link.getAttribute('title');
        if (attrTitle && attrTitle.trim().length > 3 && !attrTitle.toLowerCase().includes('click to preview')) {
            return attrTitle.trim();
        }

        // 3. Meaningful link text
        const linkText = link.innerText ? link.innerText.trim() : '';
        const genericWords = [
            'pdf', 'view', 'download', 'view pdf', 'download pdf', 'click here', 'link',
            'download form', 'read more', 'certificate', 'प्रमाण-पत्र', 'प्रशस्ति पत्र',
            'view certificate', 'view document', 'details', 'preview', 'preview pdf',
            'preview image', 'preview document', 'preview image / certificate'
        ];
        if (linkText.length > 3 && !genericWords.includes(linkText.toLowerCase())) {
            return linkText.replace(/\s+/g, ' ');
        }

        // 4. Check sibling or parent table row for description
        const tr = link.closest('tr');
        if (tr) {
            const tds = tr.querySelectorAll('td, th');
            for (let i = 0; i < tds.length; i++) {
                const tdText = tds[i].innerText.trim();
                if (tdText.length > 4 && !genericWords.includes(tdText.toLowerCase())) {
                    const firstLine = tdText.split('\n')[0].trim();
                    if (firstLine.length > 3) {
                        return firstLine;
                    }
                }
            }
        }

        // 5. Check closest card or container heading
        const card = link.closest('.card, .inner-main-card, li, .list-group-item, .item, .col-md-6, .col-lg-6, .col-12, article, .border');
        if (card) {
            const heading = card.querySelector('h1, h2, h3, h4, h5, h6, strong, b');
            if (heading && heading.innerText.trim().length > 3) {
                return heading.innerText.trim();
            }
        }

        // 6. Clean filename as fallback
        let prettyName = cleanFilename.replace(/\.(pdf|jpe?g|png|webp|gif|svg)$/i, '');
        // Remove leading timestamp pattern e.g. 13112024_103210_ or 01_ or AKU-Awards_09.07.2021_
        prettyName = prettyName.replace(/^\d+_\d+_/g, '').replace(/^\d+[-_]/g, '');
        prettyName = prettyName.replace(/^AKU-Awards_[\d\.\-_]+/i, 'AKU Award ');
        prettyName = prettyName.replace(/[-_]+/g, ' ').trim();
        const fallbackWord = mediaType === 'image' ? 'Certificate / Document Preview' : 'Document Preview';
        return prettyName.replace(/\b\w/g, c => c.toUpperCase()) || fallbackWord;
    }

    function resolveMediaUrl(rawHref) {
        let url = rawHref.trim();
        const isAdmin = window.location.pathname.toLowerCase().includes('/admin/');

        // Rewrite live or staging aku uploads to local uploads if hosted locally
        if (/https?:\/\/(?:www\.)?(?:aku\.ac\.in|aku\.thetask\.in)\/wp-content\/uploads\//i.test(url)) {
            const prefix = isAdmin ? '../uploads/' : 'uploads/';
            url = url.replace(/^https?:\/\/(?:www\.)?(?:aku\.ac\.in|aku\.thetask\.in)\/wp-content\/uploads\//i, prefix);
        } else if (isAdmin && url.startsWith('uploads/')) {
            // In admin area, if a relative uploads/ path is given without ../, fix it
            url = '../' + url;
        }

        return url;
    }

    function handleGlobalMediaClicks(e) {
        // Allow middle clicks or ctrl/cmd clicks to open in background tab if user specifically intends to
        if (e.ctrlKey || e.metaKey || e.shiftKey || e.button === 1) {
            return;
        }

        const link = e.target.closest('a');
        if (!link || !isPreviewableLink(link)) return;

        // Prevent standard page navigation / file download
        e.preventDefault();
        e.stopPropagation();

        const rawHref = link.getAttribute('href');
        const mediaType = getMediaType(rawHref);
        const resolvedUrl = resolveMediaUrl(rawHref);

        const filename = resolvedUrl.split('/').pop().split('?')[0].split('#')[0];
        const docTitle = extractTitle(link, filename, mediaType);

        openMediaModal(resolvedUrl, docTitle, decodeURIComponent(filename), mediaType);
    }

    function openMediaModal(mediaUrl, title, filename, mediaType) {
        if (!modalBackdrop) return;

        mediaType = mediaType || getMediaType(mediaUrl) || 'pdf';

        // Set UI text
        if (titleEl) titleEl.textContent = title;
        if (filenameEl) filenameEl.textContent = filename;

        // Set action buttons hrefs
        if (downloadBtn) {
            downloadBtn.href = mediaUrl;
            downloadBtn.setAttribute('download', filename);
        }

        if (fullViewBtn) {
            fullViewBtn.href = mediaUrl;
        }

        if (fallbackViewLink) {
            fallbackViewLink.href = mediaUrl;
        }

        if (fallbackDownloadLink) {
            fallbackDownloadLink.href = mediaUrl;
            fallbackDownloadLink.setAttribute('download', filename);
        }

        // Show loader
        if (loaderEl) loaderEl.classList.remove('is-hidden');

        if (mediaType === 'image') {
            // Setup Image Mode
            if (headerIconEl) {
                headerIconEl.className = 'fa-solid fa-award text-gold';
            }
            if (typeBadgeEl) {
                typeBadgeEl.textContent = 'CERTIFICATE / IMAGE';
                typeBadgeEl.style.background = 'rgba(197, 160, 89, 0.28)';
                typeBadgeEl.style.color = '#ffd700';
            }
            if (loaderTextEl) {
                loaderTextEl.textContent = 'Loading certificate image preview...';
            }

            // Hide iframe & clear it
            if (iframeEl) {
                iframeEl.style.display = 'none';
                iframeEl.src = 'about:blank';
            }

            // Display Image Viewport
            if (imageWrapEl) {
                imageWrapEl.classList.remove('d-none');
            }

            // Reset zoom
            setZoom(1.0);

            if (imageEl) {
                imageEl.onload = function() {
                    if (loaderEl) loaderEl.classList.add('is-hidden');
                };
                imageEl.onerror = function() {
                    if (loaderEl) loaderEl.classList.add('is-hidden');
                };
                imageEl.src = mediaUrl;
                imageEl.alt = title;
            }
        } else {
            // Setup PDF Mode
            if (headerIconEl) {
                headerIconEl.className = 'fa-solid fa-file-pdf text-danger';
            }
            if (typeBadgeEl) {
                typeBadgeEl.textContent = 'PDF DOCUMENT';
                typeBadgeEl.style.background = 'rgba(197, 160, 89, 0.22)';
                typeBadgeEl.style.color = '#e6ca85';
            }
            if (loaderTextEl) {
                loaderTextEl.textContent = 'Loading document preview...';
            }

            // Hide image viewport & clear it
            if (imageWrapEl) {
                imageWrapEl.classList.add('d-none');
            }
            if (imageEl) {
                imageEl.src = '';
            }

            // Show iframe
            if (iframeEl) {
                iframeEl.style.display = 'block';
                iframeEl.onload = function() {
                    if (loaderEl) loaderEl.classList.add('is-hidden');
                };

                const separator = mediaUrl.includes('#') ? '&' : '#';
                const viewerUrl = mediaUrl + separator + 'toolbar=1&navpanes=0&view=FitH';
                iframeEl.src = viewerUrl;
            }
        }

        // Show modal
        modalBackdrop.classList.add('is-active');
        document.body.style.overflow = 'hidden';
    }

    function closePdfModal() {
        if (!modalBackdrop) return;

        modalBackdrop.classList.remove('is-active');
        document.body.style.overflow = '';

        // Reset elements after animation
        setTimeout(function() {
            if (iframeEl) {
                iframeEl.src = 'about:blank';
                iframeEl.style.display = 'block';
            }
            if (imageWrapEl) {
                imageWrapEl.classList.add('d-none');
            }
            if (imageEl) {
                imageEl.src = '';
            }
            setZoom(1.0);
            if (loaderEl) loaderEl.classList.remove('is-hidden');
        }, 300);
    }

    // Expose global utilities
    window.AkuPdfPreview = {
        open: openMediaModal,
        openPdf: openMediaModal,
        openImage: function(url, title, filename) {
            openMediaModal(url, title, filename, 'image');
        },
        close: closePdfModal
    };
    window.AkuDocPreview = window.AkuPdfPreview;

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initPdfModal);
    } else {
        initPdfModal();
    }
})();
