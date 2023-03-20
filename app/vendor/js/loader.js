// document.getElementById("div").style.pointerEvents = "none";
let shmsLoaderElement = `<div class="shms-loader">
                <div class="shms-loader_container">
                    <div class="shms-loader_content">
                        
                    </div>
                </div>
            </div>`;
let shmsLoaderParent;
let shmsLoaderContentContainer;

function loadLoader(){
    document.body.insertAdjacentHTML("afterbegin", shmsLoaderElement);
    initiazationLoaderEelememts();
}

function initiazationLoaderEelememts(){
    shmsLoaderParent = document.querySelector(".shms-loader");
    shmsLoaderContentContainer = document.querySelector(".shms-loader_content");
}

// effects
function spiner(){
    let el = `<span class="spiner"></span>`;
    startShmsLoader();
    shmsLoaderContentContainer.insertAdjacentHTML("afterbegin", el);
}

function startShmsLoader(){
    loadLoader();
    shmsLoaderParent.classList.add("active");
    destoryShmsLoader();
}


function destoryShmsLoader(){
    let t = setTimeout(function () {
        shmsLoaderParent.classList.remove("active");
        clearTimeout(t);
      }, 3000);
      let t1 = setTimeout(function () {
        shmsLoaderParent.remove();
        shmsLoaderContentContainer.remove();
        clearTimeout(t1);
      }, 4000);
}

