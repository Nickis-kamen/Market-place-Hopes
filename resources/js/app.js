import './bootstrap';
// import 'aos/dist/aos.css'; // Importer le CSS d'AOS
// import { AOS } from 'aos';
// AOS.init({
    //     duration: 1200,   // Durée de l'animation en ms
    //     easing: 'ease-in-out',
    //     once: true,  // Animation qui se déclenche une seule fois
    //     mirror: false, // Animation qui ne se répète pas au retour dans la vue
    // });


    document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.getElementById('navbar');
    const absList = document.querySelectorAll('.abs');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('bg-[#ffffffda]', 'shadow-md', 'text-gray-900');
            absList.forEach(abs => {
                abs.classList.add('bg-black');
                abs.classList.remove('bg-white');
            });
            navbar.classList.remove('bg-gradient-to-r', 'from-blue-800', 'to-blue-00', 'text-white');
        } else {
            absList.forEach(abs => {
                abs.classList.add('bg-white');
                abs.classList.remove('bg-black');
            });
            navbar.classList.remove('bg-[#ffffffda]', 'shadow-md', 'text-gray-900');
            navbar.classList.add('bg-gradient-to-r', 'from-blue-800', 'to-blue-00', 'text-white');
        }
    });

    const box1 = document.querySelector('#default-sidebar');

    const section1 = document.querySelector('#section-1');

    function callback(entries,observer){
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                if (entry.target.id == 'section-1') {
                    box1.classList.add('bg-gradient-to-r','from-blue-800', 'to-blue-00');
                    box1.classList.remove('to-blue-400');
                }
            }
            else{
                if (entry.target.id == 'section-1') {
                    box1.classList.remove('bg-gradient-to-r','from-blue-800', 'to-blue-00');
                    box1.classList.add('bg-gradient-to-r','from-blue-800', 'to-blue-400');
                }
            }
        });
    }
    const observer = new IntersectionObserver(callback,{
        threshold:0.2,
        root:null
    })
    observer.observe(section1);
})

// slide
function setupScrollButtons(containerId, leftBtnId, rightBtnId, scrollAmount = 300) {
    const container = document.getElementById(containerId);
    const leftBtn = document.getElementById(leftBtnId);
    const rightBtn = document.getElementById(rightBtnId);

    if (!container || !leftBtn || !rightBtn) return;

    leftBtn.addEventListener('click', () => {
        container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
    });

    rightBtn.addEventListener('click', () => {
        container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
  });
}

setupScrollButtons('ShopContainer', 'ShopscrollLeft', 'ShopscrollRight', 300);
setupScrollButtons('categoryContainer', 'scrollLeft', 'scrollRight', 200);

window.showFull = function(id, element) {
    const fullDescription = element.getAttribute('data-full-description');
    const descElement = document.getElementById(`desc-${id}`);
    if (descElement) {
        descElement.textContent = fullDescription;
    }
};
//

//image
const fileInput = document.getElementById('fileInput');
const preview = document.getElementById('preview');

fileInput.addEventListener('change', function () {
      const file = this.files[0];
      if (file) {
          const reader = new FileReader();

          reader.addEventListener("load", function () {
              preview.setAttribute("src", this.result);
          preview.classList.remove('hidden');
        });

        reader.readAsDataURL(file);
      }
    });

