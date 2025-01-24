@extends('layouts.admin.master')
@section('title')
    {{ 'Dashboard | Laravel Auth ' }}
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
                        <div class="col-lg-12 text-center py-2">
                            <h2>Add <span class="text-primary">Letest News</span></h2>
                        </div>
                        <div class="col-lg-12">
                            <div class="card m-0 p-4">
                                <form method="POST" action="{{ route('dashboard.news.update.submit') }}" id="common_alert"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id" value="{{$letestNews->id}}">
                                    <div class="my-4">
                                        <label>News Title</label>
                                        <input required type="text" class="form-control" name="title"
                                            value="{{$letestNews->title}}">
                                    </div>
                                    <div class="my-4">
                                        <label>News Data</label>
                                        <input required type="date" class="form-control" name="date"
                                        value="{{$letestNews->date}}">
                                    </div>

                                    <div class="my-4">
                                        <label>News Details</label>
                                        <textarea class="form-control" id="ck_editor" row="10" name="details">{{$letestNews->details}}</textarea>
                                    </div>
                                    <div class="my-4">
                                        <label class="form-label">News Image</label>
                                        <input name="image" type="file" class="form-control">
                                        <input name="old_image" type="input" value="{{$letestNews->image}}" class="form-control d-none">
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>


                                </form>
                            </div>
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
@endsection
