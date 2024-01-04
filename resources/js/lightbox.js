// lightbox.js

// Wrap the code in a function
function attachLightbox() {
    const querySelector = 'img.caesar-lightbox';
    const imgUrlAttribute = 'data-src'

    const lightBoxElements = document.querySelectorAll(querySelector);
    var imageUrls = [];

    if(lightBoxElements.length > 0){
        lightBoxElements.forEach(lightBoxElement => {
            imageUrls.push(lightBoxElement.getAttribute(imgUrlAttribute));
        })
    }
    console.log('Images loaded', imageUrls);

    // Attach a single click event listener to the body
    document.body.addEventListener('click', function(e) {
        // If the clicked element is an image, handle the click
        if (e.target.matches(querySelector)) {
            e.preventDefault();

            window.dispatchEvent(new CustomEvent('lightboxelementclick', {
                detail: {
                  element: e.target,
                  imgUrl: e.target.getAttribute(imgUrlAttribute)
                }
            }));
            console.log('Event dispatched');
        }
    });

    document.addEventListener('alpine:init', () => {
        Alpine.data('caesarLightbox', () => ({
            currentImageUrl: null,

            loadPrevious(){
                let previousIndex = imageUrls.indexOf(this.currentImageUrl)-1
                if(previousIndex == -1){
                    previousIndex = imageUrls.length-1
                }

                this.currentImageUrl = imageUrls[previousIndex]
            },

            loadNext(){
                let nextIndex = imageUrls.indexOf(this.currentImageUrl)+1
                if(nextIndex == imageUrls.length){
                    nextIndex = 0
                }

                this.currentImageUrl = imageUrls[nextIndex]
            },

            handleLightboxChange(event){
                this.currentImageUrl = event.detail.imgUrl;
                console.log('Event handled', this.currentImageUrl);
            }
        }))
    })
}

// Call the function immediately when the script is loaded
attachLightbox();

// Export the function so it can be imported in app.js
export { attachLightbox };