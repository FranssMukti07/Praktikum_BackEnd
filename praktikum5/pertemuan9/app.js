const {index, store, update, destroy} = require("./Controllers/FruitController.js");

const main = () => {
    index();
    store("Melon");
    update(0, "Alpukat");
    destroy(0);
};

main();