!function(){const t=document.getElementById("hamburger"),e=document.getElementById("topMenu");t.addEventListener("click",()=>{t.classList.toggle("active"),e.classList.toggle("active")})}(),function(){const t=document.getElementById("tokensNavigation");if(t){const e=t.querySelectorAll("a"),s=document.getElementById("tokensCollection");clearLinksState=()=>{e.forEach(t=>{t.classList.remove("tokens-navigation__link_active")})},e.forEach(i=>{i.addEventListener("click",t=>{t.preventDefault(),clearLinksState(),i.classList.add("tokens-navigation__link_active");const e=i.getAttribute("data-collection-link");s.querySelectorAll("[data-collection]").forEach(t=>{t.getAttribute("data-collection")===e?(t.classList.remove("hidden"),t.classList.add("active"),setTimeout(()=>t.classList.add("visible"))):(t.classList.remove("active"),t.classList.remove("visible"),t.classList.add("hidden"))})})})}}();