const School = {
    name: "Alan",
    sayHello : function() {
        // Dans le contexte de la fonction sayHello le this de l'objet School est accessible
        function getName() {
            console.log(this.name); // undefined
        }
        getName();

        // récupère le this du contexte d'appel de la fonction fléchée  
        const getNameArrowFunction = () => console.log(this.name)
        getNameArrowFunction();
    }
}
School.sayHello(); // undefined 