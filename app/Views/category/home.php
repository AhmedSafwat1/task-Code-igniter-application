<?= $this->extend('layouts/master') ?>

<?= $this->section('title') ?>
    category!
<?= $this->endSection() ?>


<?= $this->section('content') ?>
    <h1>Categories List! <a class="btn btn-info" href="category/task">Task</a> </h1>
    <div>
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Parent Category</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories  as $category)  {?>
                    <tr>
                        <td><?php echo $category->id ; ?></td>
                        <td><?php echo $category->name ;?></td>
                        <td><?php echo $category->parent_name ?? "---" ;?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
<?= $this->endSection() ?>