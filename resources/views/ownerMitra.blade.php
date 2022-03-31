@extends('layouts.app')
  
@section('content')
@include('partials.navbar')
@include('partials.sidebarOwner')
    <div id="layoutSidenav_content">
        <style>
            main {
                font-family: 'Poppins', sans-serif;
            }
            .btn-edit{
                text-align:end;
                margin-top:30px;
                margin-right: 50px; 
                border: none;
                font-size: 30px;
            }
            .btn-edit a {
                color: black;
                transition: transform .2s;
            }
            /* .btn-edit:hover{
                transform: scale(1.1) 
            }    */
        </style>
        <main>
            <div class="container-fluid px-4">
                <div class="btn-edit">
                    <a type="button" href="/editOwner" class="edit-icon" role="button" aria-pressed="true">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                </div>
                <div class="modal-body my-2" style="text-align: center">
                    <h1 class="h2">
                        <i class="fa fa-user-circle mb-2" aria-hidden="true" style="font-size: 150px;"></i>
                    </h1>
                    <h2><strong>Ferdian Fernanda Syahputra</strong></h2>
                    <div style="color: rgb(148, 148, 148)">
                        <h5>owner@gmail.com</h5>
                        <h5>0821-2123-2384</h5>
                    </div>
                </div>
                <div class="address py-3 px-3 mb-5" style="background-color: rgb(231, 240, 245); border-radius:10px;">
                    <h4><strong>Alamat</strong></h4>
                    <h6 style="color: rgb(148, 148, 148)">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</h6>
                </div>
            </div>
        </main>
@endsection