<div class="container">
    <div class="row">
        <div class="col-md-10 col-sm-10 col-lg-10">
            <div class="card px-5 py-5">
                <div class="row justify-content-between ">
                    <div class="align-items-center col">
                        <h4>Category List</h4>
                    </div>
                    <div class="align-items-center col">
                        <button data-bs-toggle="modal" data-bs-target="#create-category"
                            class="float-end btn m-0 btn-sm bg-gradient-primary">Create
                        </button>
                        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Launch demo modal
                            </button> --}}

                    </div>
                    <hr class="bg-secondary" />
                    <div class="table-responsive">
                        <table class="table" id="tableData">
                            <thead>
                                <tr class="bg-light">
                                    <th>No</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tableList">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        getlist();
        async function getlist() {



            showLoader()
            let res = await axios.get("/list-category");
            hideLoader()


            let tableList = $('#tableList');
            let tableData = $('#tableData');

            tableData.DataTable().destroy();
            tableList.empty();
            res.data.forEach(function(item, index) {
                let row =
                    `<tr>
                            <td>${index+1}</td>
                            <td>${item['name']}</td>
                            <td>
                                <button data-id=${item['id']} class="btn EditBtn btn-sm btn-success">Edit</button>
                                <button data-id=${item['id']} class="btn DeleteBtn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>`
                tableList.append(row);
            });

            $('.EditBtn').on('click', async function() {
                let id = $(this).data('id');
                $('#update-modal').modal('show');
                await FillUpUpdateForm(id);
                // $('#update-id').val(id);

            });

            $('.DeleteBtn').on('click', function() {
                let id = $(this).data('id');
                $("#delete-modal").modal('show');
                $("#deleteID").val(id);


            })


            // tableData.DataTable();

            tableData.DataTable({
                order: [
                    [0, 'asc']
                ],
                lengthMenu: [5, 10, 15, 20]
            });
        }
    </script>


    <!-- Button trigger modal -->
