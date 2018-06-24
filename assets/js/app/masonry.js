
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
                let item = items[i * columns + j];
                columnsE[j].appendChild(item);
                item.classList.add('mansory-item');
            } else {
                for(let j = 0; j < columnsE.length; j++)
                {
                    console.log(`Altura de la columna ${(j+1)}: ` + columnsE[j].offsetHeight);
                }
                // console.log(columnsE);
                return;
            }
        }
    }
}

$(document).ready(function() {
    buildLayout(
        document.getElementById('gallery'), 
        document.querySelectorAll('.gallery-item'), 
        4
    );
})