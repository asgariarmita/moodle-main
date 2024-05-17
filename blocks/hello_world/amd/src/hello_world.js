define([
    'core/config', // lib\amd\src\config.js
    'core/modal_factory', // lib\amd\src\modal_factory.js
    'core/mustache' // lib\amd\src\mustache.js
], function (config, ModalFactory, Mustache) {
    function init() {
        console.log(config, ModalFactory, Mustache);

        //     var greeting = document.getElementById("greetingText").value;

        //     const template = `<dialog id="modal">
        //     <button id="closeIcon closeModalBtn" class="closeModalBtn">&times;</button>
        //     <div id="modalContent">
        //         <p id="modalEmail">{{email}}</p>
        //         <p id="modalGreeting">{{greeting}}</p>
        //         <button id="closeModalBtn" class="closeModalBtn">Cancel</button>
        //         <button id="confirmModalBtn closeModalBtn" class="closeModalBtn">OK</button>
        //     </div>
        // </dialog>
        // `;
        //     var renderedContent = Mustache.render(template, { greeting: greeting });

        //     var options = {
        //         type: ModalFactory.types.SAVE_CANCEL,
        //         title: 'Hello',
        //         body: renderedContent,
        //     };

        //     const modal = await ModalFactory.create(options);

        // document.getElementById("showModalBtn").addEventListener("click", () => { modal.show(); });
        // document.querySelectorAll("#closeModalBtn").forEach(el => el.addEventListener("click", () => { ModalFactory.close(); }));

        // ---- custom approach

        const dialog = document.querySelector("dialog");

        document.getElementById("showModalBtn").addEventListener("click", () => {
            var greeting = document.getElementById("greetingText").value;
            document.getElementById("modalGreeting").innerText = greeting;
            dialog.showModal();
        });
        document.querySelectorAll(".closeModalBtn").forEach(el => el.addEventListener("click", () => { dialog.close(); }));

    };

    return {
        init: init,
    }

});
