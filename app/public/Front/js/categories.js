    let categories = document.querySelectorAll(".lien_filtre");
    categories.forEach(categorie => {
        categorie.addEventListener('click', function() {

            let selectedCategorie = categorie.getAttribute('data-filter');
            let filtres = document.querySelectorAll(".lien_filtre");
            let itemsToHide = document.querySelectorAll(`.filtre_image:not([data-filter='${selectedCategorie}'])`);
            let itemsToShow = document.querySelectorAll(`.filtre_image[data-filter='${selectedCategorie}']`);

            if (selectedCategorie == 'All') {
                itemsToHide = [];
                itemsToShow = document.querySelectorAll('.filtre_image[data-filter]');
            }

            itemsToHide.forEach(el => {
                el.classList.add('hide');
                el.classList.remove('show');
            });
          
            itemsToShow.forEach(el => {
                el.classList.remove('hide');
                el.classList.add('show'); 
            });

            filtres.forEach(el=> {
                el.classList.remove('active');
            })

            categorie.classList.add('active');


        })
    })
    