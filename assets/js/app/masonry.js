
const balance = (elementsE) => {
    let index = 0;
    let heights = [];
    for(let i = 0; i < elementsE.length; i++) {
        let height = 0;
        for(let j = 0; j < elementsE[i].children.length; j++) {
            height += elementsE[i].children[j].offsetHeight + 24;
        }
        heights.push(height)
    }
    for(let i = 0; i < heights.length - 1; i++) {
        if(heights[index] > heights[i+1]) {
            index = i+1;
        }   
    }    
    return index;
}

const buildLayout = (container, items, columns) => {
    container.classList.add('masonry-layout', `columns-${columns}`)

    let columnsE = []

    for (let i = 1; i <= columns; i++) {
        let column = document.createElement("div")
        column.classList.add('masonry-column', `column-${i}`)
        container.appendChild(column)
        columnsE.push(column)
    }

    let limit = Math.ceil(items.length / columns);
    for (let i = 0; i < limit; i++) {

        for (let j = 0; j < columnsE.length; j++) {
            let index = i * columns + j;
            if( index < items.length) {
                let col = balance(columnsE);
                let item = items[index];
                columnsE[col].appendChild(item);
                item.classList.add('mansory-item');
            } else {
                return;
            }
        }
    }
}

const getValueFromRoot = name => {
    return getComputedStyle(document.documentElement, null).getPropertyValue(name);
}

const defineColumns = () => {
    let width = document.getElementById("gallery").offsetWidth;
    if(width < 450) {
        return 1;
    } else if (width < 700 && width > 450) {
        return 2;
    } else if (width < 1000 && width > 700) {
        return 3;
    } else if (width < 1300 && width > 1000) {
        return 4;
    } else {
        return 5;
    }
}

$(document).ready(function() {
    let columns = defineColumns();
    buildLayout(
        document.getElementById('gallery'), 
        document.querySelectorAll('.gallery-item'), 
        columns
    );    
})