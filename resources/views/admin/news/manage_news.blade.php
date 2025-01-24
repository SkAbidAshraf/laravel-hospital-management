@extends('layouts.admin.master')
@section('title')
    {{ 'Manage Doctor | Laravel Auth ' }}
@endsection

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.admin.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.admin.navigation')



                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-end">
                            <a href="{{route('dashboard.news.add')}}" class="btn btn-primary"> + Add Latest News</a>
                        </div>
                        <div class="col-lg-12 text-center py-2">
                            <h2>Manage <span class="text-primary">News</span></h2>
                        </div>
                        <div class="col-lg-12 table-responsive">
                            <table id="VisitorDt" class="table table-bordered dataTable" cellspacing="0" width="100%">
                                <thead class="table-dark">
                                    <tr class="text-center">
                                        <th class="th-sm">Image</th>
                                        <th class="th-sm">Title</th>
                                        <th class="th-sm">Date</th>
                                        <th class="th-sm">Details</th>
                                        <th class="th-sm">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allNews as $item)
                                        <tr class="text-center">
                                            <td class="th-sm ">
                                                <img src="{{$item->image}}" style="width:100px;height:50px" class="img-fluid" alt="Doctor Image">
                                            </td>
                                            <td class="th-sm">{{ $item->title }}</td>
                                            <td class="th-sm">{{ $item->date }}</td>
                                            <td class="th-sm text-left">
                                                @php
                                                    echo $item->details
                                                @endphp
                                            </td>

                                            <td class="th-sm">
                                                <a href="{{ route('dashboard.news.update', ['id' => $item->id]) }}" type="button"
                                                    class="btn btn-info btn-circle btn-sm"><i class="fas fa-edit"></i></a>

                                                    <button type="button" onclick="delete_news({!! $item->id !!})"
                                                        class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>


            <!-- Footer -->
            <footer class="sticky-footer bg-white py-3">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Medicare 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>


    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    </div>
        <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

        <script>
            const delete_news = (id) => {
                Swal.fire({
                    customClass: 'swalstyle',
                    title: 'Are you sure?',
                    text: "Delete this Item",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios
                            .get("/dashboard/news/delete", {
                                params: {
                                    id: id
                                }
                            })
                            .then(function(response) {

                                if (response.data.status == 200) {
                                    Swal.fire({
                                        customClass: 'swalstyle',
                                        position: 'top-center',
                                        icon: 'success',
                                        title: response.data.msg,
                                        showConfirmButton: false,
                                        timer: 1500

                                    })
                                    setTimeout(function() {
                                        location.reload();
                                    }, 1500);


                                } else {
                                    Swal.fire({
                                        customClass: 'swalstyle',
                                        position: 'top-center',
                                        icon: 'error',
                                        title: response.data.msg,
                                        text: response.data.err_msg,
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                }


                            })
                            .catch(function(error) {
                                Swal.fire({
                                    customClass: 'swalstyle',
                                        position: 'top-center',
                                        icon: 'error',
                                        title: error.message,
                                        showConfirmButton: false,
                                        timer: 1500
                                });
                            });
                    }
                })



            }
        </script>
    @endsection
