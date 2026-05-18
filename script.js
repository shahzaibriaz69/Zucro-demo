document.addEventListener("DOMContentLoaded", () => {
    
  
    const menuToggle = document.getElementById("menu-toggle");
    const mobileMenu = document.getElementById("mobile-menu");
    const mobileLinks = document.querySelectorAll(".mobile-link");

    if (menuToggle && mobileMenu) {
      
        menuToggle.addEventListener("click", () => {
            mobileMenu.classList.toggle("show");
            const icon = menuToggle.querySelector("i");
            if (icon) {
                icon.classList.toggle("fa-bars");
                icon.classList.toggle("fa-times");
            }
        });

      
        mobileLinks.forEach(link => {
            link.addEventListener("click", () => {
                mobileMenu.classList.remove("show");
                const icon = menuToggle.querySelector("i");
                if (icon) {
                    icon.classList.add("fa-bars");
                    icon.classList.remove("fa-times");
                }
            });
        });
    }

  
    const counters = document.querySelectorAll(".counter");
    
    const runCounters = () => {
        counters.forEach(counter => {
            const target = +counter.getAttribute("data-target");
            const count = +counter.innerText;
            
           
            const speed = 150; 
            const increment = target / speed;

            if (count < target) {
              
                if (target % 1 !== 0) {
                    counter.innerText = (count + increment).toFixed(1);
                } else {
                    counter.innerText = Math.ceil(count + increment).toLocaleString();
                }
                setTimeout(runCounters, 10);
            } else {
                counter.innerText = target % 1 !== 0 ? target : target.toLocaleString();
            }
        });
    };

  
    const revealElements = document.querySelectorAll(".reveal-on-scroll");
    
    const revealOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px"
    };

    const scrollObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            
            // Trigger animation active class
            entry.target.classList.add("active");
            
          
            if (entry.target.querySelector(".counter") || entry.target.classList.contains("counter")) {
                runCounters();
            }
            
            // Unobserve once animation is loaded for memory optimization
            observer.unobserve(entry.target);
        });
    }, revealOptions);

    revealElements.forEach(element => {
        scrollObserver.observe(element);
    });

   
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener("click", function(e) {
            const targetId = this.getAttribute("href");
            if (targetId === "#") return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                e.preventDefault();
                
               
                const navOffset = 120;
                const elementPosition = targetElement.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - navOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: "smooth"
                });
            }
        });
    });
});


    const diagnosticCards = document.querySelectorAll(".problem-leak-card");
    const diagnosticModal = document.getElementById("diagnostic-modal");
    const modalContent = document.getElementById("modal-content-wrapper");
    const closeModalBtn = document.getElementById("close-modal");
    const modalActionBtn = document.getElementById("modal-action-btn");

    if (diagnosticCards.length > 0 && diagnosticModal) {
        
       
        diagnosticCards.forEach(card => {
            card.addEventListener("click", () => {
                const title = card.getAttribute("data-title");
                const errorCode = card.getAttribute("data-error");
                const details = card.getAttribute("data-detail");

                document.getElementById("modal-title").innerText = title;
                document.getElementById("modal-error-code").innerText = errorCode;
                document.getElementById("modal-body").innerHTML = details;

              
                diagnosticModal.classList.remove("invisible", "opacity-0");
                diagnosticModal.classList.add("opacity-100");
                modalContent.classList.remove("scale-95");
                modalContent.classList.add("scale-100");
                document.body.style.overflow = "hidden"; 
            });
        });

       
        const closeModal = () => {
            diagnosticModal.classList.remove("opacity-100");
            diagnosticModal.classList.add("opacity-0");
            modalContent.classList.remove("scale-100");
            modalContent.classList.add("scale-95");
            setTimeout(() => {
                diagnosticModal.classList.add("invisible");
                document.body.style.overflow = ""; // Re-enable screen scroll
            }, 300);
        };

        closeModalBtn.addEventListener("click", closeModal);
        
       
        diagnosticModal.addEventListener("click", (e) => {
            if (e.target === diagnosticModal) closeModal();
        });

        modalActionBtn.addEventListener("click", closeModal);
    }