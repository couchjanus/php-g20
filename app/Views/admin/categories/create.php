<div class="col">
            
    <div class="card">
        <div class="card-header bg-primary text-white">
            <i class="fa fa-table"></i> <?php echo $title;?> <a href="/admin/categories" class="float-right"><button class="btn btn-primary text-right"><span data-feather="arrow-left-circle"></span> Go Back</button></a>
        </div>
        <div class="card-body">
            <form action="/admin/categories/store" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="categoryHelp" placeholder="Enter Category Name" required>
                </div>
                <div class="form-group">
                    <label for="username">Is active?</label>
                    <input type="checkbox" class="form-control" id="status" name="status">
                </div>

                <div class="form-group row" id="drop-area">
                    <div class="container-fluid">
                        <div class="card border-success text-center mb-3">
                            <div class="card-header bg-transparent border-success">
                                <label for="title">Add Image:</label>
                            </div>
                            <div class="card-body text-success">
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="file" id="fileElem" accept="image/*"
                                            name="image">
                                    </div>
                                    <div class="col-md-4">
                                        <p>Drop Picture Here</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent border-success">Footer</div>
                        </div>
                    </div>
                </div>
                
                <div class="mx-auto">
                    <button type="submit" class="btn btn-primary text-right">Save</button>
                </div>
            </form>
        </div>
    </div>
        
</div>
