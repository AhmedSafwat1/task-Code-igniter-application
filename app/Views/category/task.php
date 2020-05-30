<?= $this->extend('layouts/master') ?>

<?= $this->section('title') ?>
    task!
<?= $this->endSection() ?>

<?= $this->section('content') ?>
        <h2>Task</h2>
        <div id="appendCategory">
            <select class="form-control select" >
                <option disabled selected >Select Category</option>
                <?php foreach($mainCategories as $cat) : ?>
                <option value="<?php echo $cat['id']?>"><?php  echo $cat['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div id="loading" style="display:none" class="text-center ">
            <img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/200.gif" width="150" class="img-fluid">
        </div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
    <script>

        $(function () {
            var append   = $("#appendCategory")
            var loading  = $("#loading")

            $("body").on("change", ".select", function(){
                var _elm = $(this)
              
                if( _elm.val() ){
                    removeDependenceSelct(_elm)
                    loading.show()
                    $.ajax({
                        'url' : "getsubCategory/"+_elm.val(),
                        'type' : 'GET',
                        'success' : function(data) {              
                                if(data.length > 0){
                                    handleAppendCategory(data)
                                }
                                loading.hide()
                        },
                        'error' : function(request,error)
                        {
                            alert("error in api call")
                            console.log(error)
                            loading.hide()
                        }
                        });
                                           
                }
                
            })

            function removeDependenceSelct(_elm){
                _elm.nextAll("select.select").remove()
            }

            function handleAppendCategory(data){
                var select = `<select class="form-control select mt-2" >
                              <option disabled selected >Select Category</option>`

                for (let index = 0; index < data.length; index++) {
                    select +=`<option value="${data[index].id}">${data[index].name}</option>`
                    
                }
                select +=  "</select>"    
                append.append(select)         
            }
        })
        
    </script>
<?= $this->endSection() ?>