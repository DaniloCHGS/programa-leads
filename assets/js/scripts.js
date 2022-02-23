if(window.innerWidth <= 768){
    const tables = [...document.querySelectorAll('.table')]
    tables.forEach(table=>{table.classList.add('table-responsive')})
}