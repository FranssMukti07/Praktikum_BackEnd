const fruits = require("../data/fruits.js");

const index = () => {
    console.log("\nIndex ==== \n--------------------------------------");
    for (const fruit of fruits) {
        console.log(fruit);
    }
};

const store = (name) => {
    console.log("\nStore ==== \n--------------------------------------");
    fruits.push(name);
    index();
};

const update = (no, name) => {
    console.log("\nUpdate ==== \n--------------------------------------");
    fruits[no] = name;
    index();
};

const destroy = (no) => {
    console.log("\nDestroy ==== \n--------------------------------------");
    fruits.splice(no, 1);
    index();
};

module.exports = {index, store, update, destroy};