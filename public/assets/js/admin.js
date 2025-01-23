/**
     * Not working because the buttons are dynamically added, so we use EVENT DELEGATION: 
     * If you instead directly bind the event using $('.btn-primary').click(...), 
     * it will only work for .btn-primary elements that exist at the time the handler is assigned. 
     * Any new buttons added after that won't trigger the click event. 
     * By attaching the event handler to a parent container (like #gift-list), you avoid potential duplication of code and ensure maintainability. You don't have to re-bind click handlers every time you update or replace the .btn-primary elements.
     * So $('.reject-btn').on('click', function(e){}) Won't work 
*/
$(document).ready(function () {
    // Handle CRUD actions
    handleDeleteConfirmation();
    handleModalData();
    handleViewPhotosClick();
    
    // Handle the deletion of photos in the carousel and main photo section
    function handleDeleteConfirmation() {
        // Confirm delete action before proceeding
        $('.delete-btn').click(function () {
            return confirm("Are you sure you want to delete this record?");
        });
    }

    function handleModalData() {
        // Fill modal fields with values dynamically
        $('#modifyModal').on('show.bs.modal', function (event) {
            const button = $(event.relatedTarget); // Triggering button
            const modal = $(this);
            const columnNames = ['habitation_id', 'type_id', 'chambres', 'loyer_par_jour', 'quartier', 'description'];
            
            columnNames.forEach(column => {
                modal.find(`[name="${column}"]`).val(button.data(column));
            });

            modal.find('form').attr('action', `${baseUrl}/update/house`);
        });

        // Ensure the correct type is selected in the dropdown
        $('#modifyModal').on('shown.bs.modal', function () {
            const typeId = $(this).find('[name="type_id"]').val();
            $(this).find(`[name="type_id"] option[value="${typeId}"]`).prop('selected', true);
        });
    }

    function handleViewPhotosClick() {
        // Handle when the "View Photos" button is clicked
        $(".view-photos-btn").on("click", function () {
            const houseId = $(this).data("habitation_id");
            fetchPhotos(houseId);
        });
    }

    // Fetch photos and render them
    function fetchPhotos(houseId) {
        $.get(`${baseUrl}/api/photos`, { habitation_id: houseId }, function (photos) {
            const mainPhotoContainer = $("#mainPhotoContainer");
            const carouselInner = $("#carouselInner");

            // Empty containers before populating
            mainPhotoContainer.empty();
            carouselInner.empty();

            if (photos.length > 0) {
                renderMainPhoto(photos[0], mainPhotoContainer);
                renderCarouselPhotos(photos.slice(1), carouselInner);
            }

            $("#viewPhotosModal").modal("show");
        });
    }

    // Render the main photo with delete functionality
    function renderMainPhoto(photo, container) {
        container.append(`
            <img src="${baseUrl}/assets/img/houses/${photo.photo_url}" alt="Main Photo">
            <button class="delete-photo-btn" data-photo_id="${photo.photo_id}">×</button>
        `);

        container.find(".delete-photo-btn").on("click", function () {
            deletePhoto($(this).data("photo_id"), () => {
                container.empty(); // Clear main photo after deletion
            });
        });
    }

    // Render photos for the carousel with delete functionality
    function renderCarouselPhotos(photos, container) {
        photos.forEach((photo, index) => {
            const isActive = index === 0 ? "active" : "";
            container.append(`
                <div class="carousel-item ${isActive}">
                    <img src="${baseUrl}/assets/img/houses/${photo.photo_url}" alt="Photo ${index + 2}">
                    <button class="delete-photo-btn" data-photo_id="${photo.photo_id}">×</button>
                </div>
            `);
        });

        // Attach delete functionality to carousel photos
        container.find(".delete-photo-btn").on("click", function () {
            const photoId = $(this).data("photo_id");
            deletePhoto(photoId, () => {
                const carouselItem = $(this).closest(".carousel-item");
                const isActive = carouselItem.hasClass("active");

                carouselItem.remove();

                // Adjust active carousel item if needed
                if (isActive) {
                    const nextItem = $(".carousel-item:first");
                    if (nextItem.length > 0) {
                        nextItem.addClass("active");
                    }
                }

                // Trigger carousel update
                $('#photosCarousel').carousel('dispose').carousel();
            });
        });
    }

    // Delete photo function
    function deletePhoto(photoId, callback) {
        $.ajax({
            url: `${baseUrl}/delete/photo`,
            method: 'POST',
            data: {photo_id: photoId},
            success: function () {
                alert("Photo deleted successfully!");
                callback();
            },
            error: function () {
                alert("Failed to delete the photo.");
            },
        });
    }
});

/* VANILLA JS */
/*
document.addEventListener('DOMContentLoaded', function () {

    // Handle CRUD actions
    handleDeleteConfirmation();
    handleModalData();
    handleViewPhotosClick();

    // Handle the deletion of photos in the carousel and main photo section
    function handleDeleteConfirmation() {
        // Confirm delete action before proceeding
        const deleteBtns = document.querySelectorAll('.delete-btn');
        deleteBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                return confirm("Are you sure you want to delete this record?");
            });
        });
    }

    function handleModalData() {
        const modifyModal = document.getElementById('modifyModal');

        // Fill modal fields with values dynamically
        modifyModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget; // Triggering button
            const modal = this;
            const columnNames = ['habitation_id', 'type_id', 'chambres', 'loyer_par_jour', 'quartier', 'description'];

            columnNames.forEach(function (column) {
                modal.querySelector(`[name="${column}"]`).value = button.dataset[column];
            });

            modal.querySelector('form').setAttribute('action', `${baseUrl}/update/house`);
        });

        // Ensure the correct type is selected in the dropdown
        modifyModal.addEventListener('shown.bs.modal', function () {
            const typeId = this.querySelector('[name="type_id"]').value;
            const selectedOption = this.querySelector(`[name="type_id"] option[value="${typeId}"]`);
            selectedOption.selected = true;
        });
    }

    function handleViewPhotosClick() {
        // Handle when the "View Photos" button is clicked
        const viewPhotosBtns = document.querySelectorAll(".view-photos-btn");
        viewPhotosBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                const houseId = btn.dataset.habitation_id;
                fetchPhotos(houseId);
            });
        });
    }

    // Fetch photos and render them
    function fetchPhotos(houseId) {
        fetch(`${baseUrl}/api/photos?habitation_id=${houseId}`)
            .then(response => response.json())
            .then(photos => {
                const mainPhotoContainer = document.getElementById("mainPhotoContainer");
                const carouselInner = document.getElementById("carouselInner");

                // Empty containers before populating
                mainPhotoContainer.innerHTML = '';
                carouselInner.innerHTML = '';

                if (photos.length > 0) {
                    renderMainPhoto(photos[0], mainPhotoContainer);
                    renderCarouselPhotos(photos.slice(1), carouselInner);
                }

                const viewPhotosModal = document.getElementById("viewPhotosModal");
                viewPhotosModal.classList.add('show');
            })
            .catch(() => alert('Failed to fetch photos.'));
    }

    // Render the main photo with delete functionality
    function renderMainPhoto(photo, container) {
        const imgElement = document.createElement('img');
        imgElement.src = `${baseUrl}/assets/img/houses/${photo.photo_url}`;
        imgElement.alt = "Main Photo";
        const deleteBtn = document.createElement('button');
        deleteBtn.classList.add('delete-photo-btn');
        deleteBtn.dataset.photo_id = photo.photo_id;
        deleteBtn.textContent = '×';

        deleteBtn.addEventListener('click', function () {
            deletePhoto(photo.photo_id, function () {
                container.innerHTML = ''; // Clear main photo after deletion
            });
        });

        container.appendChild(imgElement);
        container.appendChild(deleteBtn);
    }

    // Render photos for the carousel with delete functionality
    function renderCarouselPhotos(photos, container) {
        photos.forEach(function (photo, index) {
            const isActive = index === 0 ? "active" : "";
            const itemDiv = document.createElement('div');
            itemDiv.classList.add('carousel-item', isActive);

            const imgElement = document.createElement('img');
            imgElement.src = `${baseUrl}/assets/img/houses/${photo.photo_url}`;
            imgElement.alt = `Photo ${index + 2}`;

            const deleteBtn = document.createElement('button');
            deleteBtn.classList.add('delete-photo-btn');
            deleteBtn.dataset.photo_id = photo.photo_id;
            deleteBtn.textContent = '×';

            deleteBtn.addEventListener('click', function () {
                deletePhoto(photo.photo_id, function () {
                    const carouselItem = deleteBtn.closest(".carousel-item");
                    const isActive = carouselItem.classList.contains("active");

                    carouselItem.remove(); // Remove the deleted photo from the carousel

                    // Adjust active carousel item if needed
                    if (isActive) {
                        const nextItem = document.querySelector(".carousel-item:first-child");
                        if (nextItem) {
                            nextItem.classList.add("active");
                        }
                    }

                    // Trigger carousel update
                    const photosCarousel = document.getElementById('photosCarousel');
                    photosCarousel.carousel('dispose').carousel();
                });
            });

            itemDiv.appendChild(imgElement);
            itemDiv.appendChild(deleteBtn);
            container.appendChild(itemDiv);
        });
    }

    // Delete photo function
    function deletePhoto(photoId, callback) {
        fetch(`${baseUrl}/delete/photo`, {
            method: 'POST',
            body: new URLSearchParams({ photo_id: photoId }),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to delete photo');
                }
                alert("Photo deleted successfully!");
                callback();
            })
            .catch(() => alert("Failed to delete the photo."));
    }
});

*/