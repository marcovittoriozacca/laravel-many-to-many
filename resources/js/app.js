import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])


const deleteModalBtn = document.querySelectorAll('#modal-btn');

deleteModalBtn.forEach(element => {

    element.addEventListener('click', function(){
        let windowLocation = window.location.origin;
        let path = element.getAttribute('data-path');
        let slug = element.getAttribute('data-slug');
      
        const url = `${windowLocation}/dashboard/${path}/${slug}`;
        const form = document.getElementById('record-to-delete');

        form.setAttribute('action', url);
    })
});


const projMainThumb = document.getElementById('project_main_thumb');
if(projMainThumb){
    const img_attribute = projMainThumb.getAttribute('data-slug-img');
    
    switch (true) {
        case img_attribute.includes('https://'):
            projMainThumb.setAttribute('src', img_attribute);
            break;
        case img_attribute.includes('proj_images/'):
            const storageImagePath = `${window.location.origin}/storage/${img_attribute}`;
            projMainThumb.setAttribute('src', storageImagePath );
        default:
            break;
    }
}
