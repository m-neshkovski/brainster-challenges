class Book {
    constructor(_title, _author, _maxPages) {
        this.title = _title,
        this.author = _author,
        this.maxPages = _maxPages,
        this.onPage = 0
    };

    setOnPage = function(pageNo) {
        this.onPage = pageNo;
    }
};

let list1 = document.querySelector('#list1');
let list2 = document.querySelector('#list2');

let table = document.querySelector('.table');

let books = [];

function percentCompleted(total, completed) {
    return Math.floor(completed*100/total);
}

function transformArrayObjectsToBooks(arrayObjects) {
    let temp_books = [];
    arrayObjects.forEach(book => {
        let temp_book = new Book(book.title, book.author, book.maxPages);
        temp_book.setOnPage(book.onPage);
        temp_books.push(temp_book);
    })
    
    return temp_books;
}

if (localStorage.getItem('mn-books')) {
    books = JSON.parse(localStorage.getItem('mn-books'));

    books = transformArrayObjectsToBooks(books);

} else {
    books = [
        {
            title: 'The Hobbit',
            author: 'J.R.R. Tolkien',
            maxPages: '200',
            onPage: '60',
        },
    
        {
            title: 'Harry Potter',
            author: 'J.K. Rowling',
            maxPages: '250',
            onPage: '150',
        },
    
        {
            title: '50 Shades of Grey',
            author: 'E.L. James',
            maxPages: '150',
            onPage: '150',
        },
        
        {
            title: 'Don Quixote',
            author: 'Miguel de Cervantes',
            maxPages: '350',
            onPage: '300',
        },
        
        {
            title: 'Hamlet',
            author: 'William Shakespeare',
            maxPages: '550',
            onPage: '550'
        }
    
    ];
    
    books = transformArrayObjectsToBooks(books);

    let booksString = JSON.stringify(books);
    localStorage.setItem('mn-books', booksString);
}

function createList1(book, createList2) {
    let li = document.createElement('li');
    li.innerText = `${book.title} by ${book.author}`;
    list1.appendChild(li);

    createList2(book, table, createTableRow);
}

function createList2(book, table, createTableRow) {
    if (book.maxPages == book.onPage) {
        let li = document.createElement('li');
        li.innerText = `You already have read ${book.title} by ${book.author}`;
        li.classList.add('text-success');
        list2.appendChild(li);
    } else {
        let li = document.createElement('li');
        li.innerText = `You still need to read ${book.title} by ${book.author}`;
        li.classList.add('text-danger');
        list2.appendChild(li);
    }

    createTableRow(book, table);
}

function createTableRow(book, table) {
    let tr = document.createElement('tr');
    let percent = percentCompleted(book.maxPages, book.onPage);
    tr.innerHTML = `
        <td>${book.title}</td>
        <td>${book.author}</td>
        <td>${book.maxPages}</td>
        <td>${book.onPage}</td>
        <td>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: ${percent}%" aria-valuenow="${percent}" aria-valuemin="0" aria-valuemax="100">${percent}%</div>
            </div>
        </td>
    `;

    table.lastElementChild.appendChild(tr);
}

books.forEach(book => {
    
    createList1(book, createList2);
    
})

document.getElementById('form').addEventListener('submit', function(e) {
    e.preventDefault();

    let inputValues = document.querySelectorAll('.form-control');

    let book = new Book(inputValues[0].value, inputValues[1].value, inputValues[3].value);
    book.setOnPage(inputValues[2].value);

    books.push(book);
    let booksString = JSON.stringify(books);
    localStorage.setItem('mn-books', booksString);

    createList1(book, createList2);

    inputValues.forEach(member => {
        member.value = '';
    })

})


