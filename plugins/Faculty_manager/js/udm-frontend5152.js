
document.addEventListener('DOMContentLoaded', function(){
    // Simple accordion for any wrapper with class .udm-accordion
    document.querySelectorAll('.udm-accordion').forEach(function(wrapper){
        wrapper.querySelectorAll('.udm-accordion-toggle').forEach(function(btn){
            btn.addEventListener('click', function(){
                var item = this.parentElement;
                var content = item.querySelector('.udm-accordion-content');
                var expanded = this.getAttribute('aria-expanded') === 'true';
                if ( expanded ) {
                    content.style.display = 'none';
                    this.setAttribute('aria-expanded','false');
                } else {
                    // close others? comment this block to allow multiple open
                    wrapper.querySelectorAll('.udm-accordion-content').forEach(function(c){
                        c.style.display = 'none';
                        var t = c.parentElement.querySelector('.udm-accordion-toggle');
                        if (t) t.setAttribute('aria-expanded','false');
                    });
                    content.style.display = 'block';
                    this.setAttribute('aria-expanded','true');
                }
            });
        });
    });
});
