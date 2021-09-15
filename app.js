$(function() {

    let edit = false;
    console.log(' jQuery is working');
    $('#task-result ').hide();
    fetchTasks();

    $("#nuevo").click(function() {

        $(".modal-header").css("background-color", "#28a745");
        $(".modal-header").css("color", "#FFFFFF");
        $(".modal-title").text("Nuevo juguete");
        $("#exampleModal").modal("show");
        opcion = 1;
    });




    $('#search').keyup(function(e) {
        if ($('#search').val()) {
            let search = $('#search').val();
            console.log(search);
            $.ajax({
                url: 'task-search.php',
                type: 'POST',
                data: { search: search },
                success: function(response) {
                    let tasks = JSON.parse(response);
                    let template = '';

                    tasks.forEach(task => {
                        template += `<li>
                        ${task.Id}
                       ${task.name}
                       ${task.presentation}
                       ${task.description}
                       ${task.tipo}
                       ${task.stock}
                       ${task.zona}
                       ${task.procedencia}


                    </li>`
                    });
                    $('#container').html(template);
                    $('#task-result').show();
                }
            });
        }
    });


    $('#task-form').submit(function(e) {
        const postData = {
            name: $('#name').val(),
            presentation: $('#presentation').val(),
            description: $('#description').val(),
            tipo: $('#tipo').val(),
            stock: $('#stock').val(),
            zona: $('#zona').val(),
            procedencia: $('#procedencia').val(),
            Id: $('#taskId').val()
        };
        let url = edit === false ? 'task-add.php' : 'task-edit.php';
        console.log(url);

        $.post(url, postData, function(response) {
            console.log(response);


            fetchTasks();

            $('#task-form').trigger('reset');
        });
        console.log(postData);

        e.preventDefault();
    });

    function fetchTasks() {
        $.ajax({
            url: 'task-list.php',
            type: 'GET',
            success: function(response) {
                let tasks = JSON.parse(response);
                let template = '';
                tasks.forEach(task => {
                    template += `
                    <tr taskId= ${task.Id}>
                        <td >${task.Id}</td>
                        <td>
                        <a >${task.name} </a>
                        </td>
                        <td>${task.presentation}</td>
                        <td>${task.description}</td>
                        <td>${task.tipo}</td>
                        <td>${task.stock}</td>
                        <td>${task.zona}</td>
                        <td>${task.procedencia}</td>
                        
                        <td>
                        <button class=" task-item btn btn-primary" >
                        Edit
                        </button>
                        </td>
                        <td>
                           <button class=" task-delate btn btn-danger">
                           Delate
                           </button>
                        </td>
                    </tr>
                `
                });
                $('#tasks').html(template);
            }
        });
    }
    $(document).on('click', '.task-delate', function() {
        if (confirm('¿Estás seguro de querer eliminarlo?')) {

            let element = $(this)[0].parentElement.parentElement;
            let Id = $(element).attr('taskId');
            $.post('task-delete.php', { Id }, function(response) {
                fetchTasks();
                opcion = 3;
            })
        }
    });



    $(document).on('click', '.task-item', function() {
        let element = $(this)[0].parentElement.parentElement;
        let Id = $(element).attr('taskId');
        $.post('task-single.php', { Id }, function(response) {
            const task = JSON.parse(response);
            $('#name').val(task.name);
            $('#presentation').val(task.presentation);
            $('#description').val(task.description);
            $('#tipo').val(task.tipo);
            $('#stock').val(task.stock);
            $('#zona').val(task.zona);
            $('#procedencia').val(task.procedencia);
            $('#taskId').val(task.Id);
            opcion = 2;
            $(".modal-header").css("background-color", "#007bff");
            $(".modal-header").css("color", "#FFFFFF");
            $(".modal-title").text("Editar juguete");
            $("#exampleModal").modal("show");
            edit = true;

        })

    });




})