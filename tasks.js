$(document).ready(function(){

    function currentUser(){
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'current_user.php', true);
        xhr.onload = function(){
            if (this.status==200){
                var user = JSON.parse(this.responseText);
                console.log(user.id)
            $('#user_info').html(
                '<p class="datos">Usuario: '+user.usuario+'. ID:'+user.id+
                '  <a id="logout" href="login.php">Cerrar sesión</a></p>' +
                '<h1>Bienvenidx '+user.nombre+' '+user.apellido+'.</h1>'
            );
            }
        }
        xhr.send()
    }
    currentUser();
    
    $("#new").on("click", function(){
        if($(this).html()== "↓"){
            $("#task-form").css("display", "block");
            $(this).html("↑");
            $('html,body').animate({
                scrollTop: $("#new").offset().top}, 'slow');
        }else{
            $("#task-form").css("display", "none");
            $(this).html("↓");
            $('html,body').animate({
                scrollTop: $("#user_info").offset().top},'slow');
        }
    
    })
    
    function loadTasks(){
        var filtro_estado = $('select#filtro_estado').val();
        console.log(filtro_estado);
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'existing_tasks.php?filtro_estado='+filtro_estado, true);
        xhr.onload = function(){
            if (this.status==200){
                console.log(this.responseText);
                var tasks = JSON.parse(this.responseText);
                var output= '';
                var categorias = [];
                var filtro_cg = $('#filtro_categoria').val();
                console.log(filtro_cg)

                for (var i in tasks){
                    var pr = tasks[i].prioridad;
                    var span_class = "";
                    if(pr>7){
                        span_class = "imp";
                    }else if (pr>4){
                        span_class = "medio";
                    }else{
                        span_class = "irrelev";
                    }
                    if (filtro_cg=="Todas"){
                        output += '<div class="task">' +
                        '<h2>'+tasks[i].actividad+'</h2>' +
                        '<p class=categ>CATEGORÍA: '+tasks[i].categoría+'</p>'+
                        '<p><span class='+span_class+'>'+ pr + 
                        '</span> - '+tasks[i].fecha+' - ' + tasks[i].estado+
                        '<p class="categ"></p>'+
                        '<p>'+tasks[i].descripcion+'</p>';
                        if (tasks[i].estado =='Pendiente'){
                            output += '<button class="completar" id='+tasks[i].id+'>Marcar como completada</button>'
                        }    
                        output+='</div>';
                    }else{
                        console.log(tasks[i].categoría)
                        if (tasks[i].categoría == filtro_cg){
                            output += '<div class="task">' +
                            '<h2>'+tasks[i].actividad+'</h2>' +
                            '<p class=categ>CATEGORÍA: '+tasks[i].categoría+'</p>'+
                            '<p><span class='+span_class+'>'+ pr + 
                            '</span> - '+tasks[i].fecha+' - ' + tasks[i].estado+
                            '<p class="categ"></p>'+
                            '<p>'+tasks[i].descripcion+'</p>';
                            if (tasks[i].estado =='Pendiente'){
                                output += '<button class="completar" id='+tasks[i].id+'>Marcar como completada</button>'
                            }    
                            output+='</div>';
                            }
                    }
                    

                    if (!categorias.includes(tasks[i].categoría)){
                        categorias.push(tasks[i].categoría)
                    }
                }
                console.log(categorias);
                var output2 = '<option>Todas</option>';
                for (categ in categorias){
                    output2 += '<option>'+categorias[categ]+'</option>'
                }
                $('#to-do').html(output);
                $('#filtro_categoria').html(output2).val(filtro_cg);
            }
        }
        xhr.send()
    }

    $(document).ready(loadTasks());
    $('#btn_crear').on('click', postTask);
    $('#filtro_categoria').change(loadTasks);

    function postTask(e){
        e.preventDefault();
        var xhr = new XMLHttpRequest();

        var act = document.getElementById('act').value;
        var descripcion = document.getElementById('descripcion').value;
        var categoria = document.getElementById('categoria').value;
        var prioridad = document.getElementById('prioridad').value;
        var fecha = document.getElementById('fecha').value;
        
        var data = 'act='+act+'&descripcion='+descripcion+'&categoria='+categoria+'&prioridad='+prioridad+'&fecha='+fecha;

        xhr.open('POST', 'new_task.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        
        xhr.onload = function(){
            console.log(this.responseText);
        }
        xhr.send(data);
        loadTasks();

        $('#act').val('');
        $('#descripcion').val('');
        $('#categoria').val('');
        $('#prioridad').val('');
        $('#fecha').val('');
        $('#new').click();
    }

    $(document).on('click', 'button.completar', function(){
        console.log($(this).attr('class'));
        if ($(this).attr('class')=="completar"){
            console.log('clicked');
            var task_id = $(this).attr('id');
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'completed_task.php?task_id='+task_id, true);
            xhr.onload = function(){
            if (this.status==200){
                console.log(this.responseText);
                }
            }
            xhr.send();
            loadTasks();
        }
    });

    $('select#filtro_estado').change(function(){
        loadTasks();
    })
})