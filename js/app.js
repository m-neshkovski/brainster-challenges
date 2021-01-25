$(document).ready(function() {

    // funkcija za presmetuvanje na a sekogas koga ima promena
    function calsulateExpances(arrObj) {
        let sum = 0;
        arrObj.forEach(obj => {
            sum += parseInt(obj.amount);
        })
        return sum;
    }

    function writeArrToLocalSotorage(name, arr) {
        let string = JSON.stringify(arr);
        localStorage.setItem(name, string);
    }

    // funkcija koja ce gi osvezuva redicite vo tabela pri promena
    function createExpanseRows(arrObj) {
        let html = '';
        arrObj.forEach(obj => {
            html += `
                <tr id="tr-${obj.id}">
                    <td class="expense-title">- ${obj.title}</td>
                    <td class="expense-amount">${obj.amount}</td>
                    <td>
                        <span><i class="fas fa-edit edit-icon" data-id="${obj.id}" data-type="edit"></i></span>
                        <span><i class="fas fa-trash delete-icon" data-id="${obj.id}" data-type="delete"></i></span>
                    </td>
                </tr>
            `
        });
        $('#expanses-table tbody').html(html);
        return true
    }

    function expenseFormValidation(title, amount) {
        let messageErr = ""
        let flag = false;

        if (title == "") {
            flag = true
            messageErr += "Title cant be empty!!"
        }

        if (amount == "" || amount < 0) {
            flag = true
            messageErr += " Amount cant be empty, zero or negative"
        }

        if (flag) {
            return messageErr;
        } else {
            return false
        }


    }

    let expanses = 0;
    // ovija ni gi treba od localStorage
    let budget = 0;
        if (localStorage.getItem('budget')) {
            budget = parseInt(localStorage.getItem('budget'));
        }
    let expansesObj = [];
        if (localStorage.getItem('expansesObj')) {
            expansesObj = JSON.parse(localStorage.getItem('expansesObj'))
        }
    let expenseIndex = 0;
        if (localStorage.getItem('expenseIndex')) {
            expenseIndex = parseInt(localStorage.getItem('expenseIndex'));
        }
    let idToEdit = null;
        if (localStorage.getItem('idToEdit')) {
            idToEdit = parseInt(localStorage.getItem('idToEdit'));
        }

    
    // inicijalni vrednosti odkako ce se povlecat od baza
    $('#budget-amount').text(budget);
    expanses = calsulateExpances(expansesObj);
    $('#expense-amount').text(expanses);
    $('#balance-amount').text(budget - expanses);
    createExpanseRows(expansesObj)

    if (idToEdit != null) {
        
            for(let i = 0; i < expansesObj.length; i++) {
                
                if (idToEdit == expansesObj[i].id) {
                    $('#expense-input').val(expansesObj[i].title);
                    $('#amount-input').val(expansesObj[i].amount);
                }
            }
    }
    
    if(expansesObj.length != 0) {
        expanses = calsulateExpances(expansesObj)
    }

    $('#expense-amount').text(expanses);

    $('#budget-form').on('submit', function(e) {
        e.preventDefault();

        if($('#budget-input').val() > 0) {
            budget = $('#budget-input').val();
            localStorage.setItem('budget', budget);
            $('#budget-amount').text(budget);
            $('#balance-amount').text(budget - expanses);
            $('#budget-input').val("");
        } else {
            $('#budget-feedback').text('Input cant be zero or negative.')
            $('#budget-feedback').show(400)
            $('#budget-input').on('focus', function(e) {
                $('#budget-feedback').hide(400);
            })
        }
    })

    
    // add expanse
    $('#expense-form').on('submit', function(e) {
        e.preventDefault();

        if (idToEdit == null) {
            // expense-feedback
            if (!expenseFormValidation($('#expense-input').val(), $('#amount-input').val())) {

                let obj = {
                    id: expenseIndex,
                    title: $('#expense-input').val(),
                    amount: $('#amount-input').val()
                }
                expenseIndex++
                localStorage.setItem('expenseIndex', expenseIndex);
                expansesObj.push(obj);
                writeArrToLocalSotorage('expansesObj', expansesObj);
                
                expanses = calsulateExpances(expansesObj)
        
                $('#expense-amount').text(expanses);
                $('#balance-amount').text(budget - expanses);
                createExpanseRows(expansesObj)
                $('#expense-input').val("")
                $('#amount-input').val("")

            } else {
                
                // greska ima
                $('#expense-feedback').text(expenseFormValidation($('#expense-input').val(), $('#amount-input').val()))
                $('#expense-feedback').show(400)
                $('#expense-input').on('focus', function(e) {
                    $('#expense-feedback').hide(400);
                })
                $('#amount-input').on('focus', function(e) {
                    $('#expense-feedback').hide(400);
                })

            }


               
                
                
            


        } else {

            if (!expenseFormValidation($('#expense-input').val(), $('#amount-input').val())) {

                for(let i = 0; i < expansesObj.length; i++) {
                    if (idToEdit == expansesObj[i].id) {
                        expansesObj[i].title = $('#expense-input').val();
                        expansesObj[i].amount = $('#amount-input').val()
                    }
                }
                writeArrToLocalSotorage('expansesObj', expansesObj);
                createExpanseRows(expansesObj)
                expanses = calsulateExpances(expansesObj)
                $('#expense-amount').text(expanses);
                $('#balance-amount').text(budget - expanses);
                $('#expense-input').val("")
                $('#amount-input').val("")
                idToEdit = null;
                localStorage.removeItem('idToEdit', idToEdit);

            } else {
                // greska ima
                $('#expense-feedback').text(expenseFormValidation($('#expense-input').val(), $('#amount-input').val()))
                $('#expense-feedback').show(400)
                $('#expense-input').on('focus', function(e) {
                    $('#expense-feedback').hide(400);
                })
                $('#amount-input').on('focus', function(e) {
                    $('#expense-feedback').hide(400);
                })
            }

        }
    })

    $(document).on('click', $('#edit-icon'), function(e) {
        if (e.target.dataset.type == 'edit') {
            idToEdit = e.target.dataset.id;
            localStorage.setItem('idToEdit', idToEdit)
            $('#expense-input').val(expansesObj.filter(obj => obj.id == idToEdit)[0].title)
            $('#amount-input').val(parseInt(expansesObj.filter(obj => obj.id == idToEdit)[0].amount))
            // createExpanseRows(expansesObj);
        }
    })

    $(document).on('click', $('#delete-icon'), function(e) {
        if (e.target.dataset.type == 'delete') {
            let idToDelete = e.target.dataset.id;

            for(let i = 0; i < expansesObj.length; i++) {
                if (idToDelete == expansesObj[i].id) {
                    expansesObj.splice(i, 1);
                }
            }
            writeArrToLocalSotorage('expansesObj', expansesObj);           
            createExpanseRows(expansesObj);
            expanses = calsulateExpances(expansesObj)
            $('#expense-amount').text(expanses);
            $('#balance-amount').text(budget - expanses);
        }
    })
    
})