var main_dir = '';
var current_dir = '';
var previous_dir = '';
var temp_main = '';

$('document').ready(function(){
    main_dir = atob(maindir);
    display_main(main_dir);
    $("#floatingInput").val(main_dir);

    $('a').click( function(e) {
        e.preventDefault();
        console.log('Clicked');
        return false;
    });

    $(document).on('click','#links',function(){
        document.getElementById("back").disabled = false;
        $("#home").removeClass();
        var route = (this.href).substring(8);
        current_dir = route;
        previous_dir = previous_folder(current_dir);
        display_main(route);
        document.getElementById("home").classList.add('btn');
        document.getElementById("home").classList.add('btn-primary');
        document.getElementById("home").classList.add('btn-lg');
        document.getElementById("home").classList.add(route);
        $("#floatingInput").val(current_dir);
    });

    $(document).on('click','#home',function(){
        console.log(this.classList.value);
        display_main(main_dir);
        $("#floatingInput").val(main_dir);
    });

    $(document).on('click','#back',function(){
        if (previous_dir != '')
        {
            console.log(this.classList.value);
            display_main(previous_dir);
            current_dir = previous_dir;
            previous_dir = previous_folder(current_dir);
            $("#floatingInput").val(current_dir);
        }

        temp_main = main_dir.replaceAll('\\', '/');
        if (temp_main == current_dir){
            $("#back").attr('disable', true);
            document.getElementById("back").disabled = true;
        }

    });


});

function previous_folder(route){
    var arr = route.split('/');
    var size = arr.length;
    var current_dir = '';
    for (var i=0; i<size-1; i++){
        current_dir += '/' + arr[i];
    }
    return current_dir.replace('/', '');
}

function display_main( main_dir ){
    $.ajax({
           type: "POST",
           url: "ajax.php",
           data: {function: 'scan_dir', main_dir: main_dir},
           success: function (resp){
               list = JSON.parse(resp);
               console.log(list);
               display_list(list);
           }
           ,
            error: function(request,error) {
                alert('An error occurred attempting to get new e-number');
                // console.log(request, error);
            }
    });
}

function display_list(list){
    $('#list').empty();
    (list.content).forEach(element => {
        if (typeof element.folder !== 'undefined'){
            var a = document.createElement('a');
            var link = document.createTextNode(element.folder);
            a.appendChild(link);
            a.id = 'links';
            a.href = element.folder;
            document.getElementById("list").appendChild(a);
            var br = document.createElement("br");
            var foo = document.getElementById("list");
            foo.appendChild(br);
        }else{
            var para = document.createElement("P");
            para.innerHTML = element.url;
            document.getElementById("list").appendChild(para);
        }
    });
}