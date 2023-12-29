function hoverImg(e){
    const img = e.target;
    const parentDiv = img.closest('div');
    parentDiv.classList.remove('hover:bg-green-500')
}

function unHoverImg(e) {
    const img = e.target;
    const parentDiv = img.closest('div');
    parentDiv.classList.add('hover:bg-green-500')
}
