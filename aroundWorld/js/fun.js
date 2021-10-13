export function querySelectorAll(selectorName) {
    var obj = document.querySelectorAll(selectorName);
    return obj
};
export function getById(idName) {
    var obj = document.getElementsById(idName);
    return obj
};
export function getClass(className) {
    var obj = document.getElementsByClassName(className);
    return obj
};
export function scrivi(paper, ink){
    paper.innerHTML = ink;
};

