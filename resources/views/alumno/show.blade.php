@extends('layouts.app')

@section('template_title')
    {{ $alumno->name ?? "{{ __('Show') Alumno" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Alumno</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('alumno.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nocontrol:</strong>
                            {{ $alumno->NoControl }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $alumno->Nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Grupo:</strong>
                            {{ $alumno->Grupo }}
                        </div>
                        <div class="form-group">
                            <strong>Semestre:</strong>
                            {{ $alumno->Semestre }}
                        </div>
                        <div class="form-group">
                            <strong>Carrera:</strong>
                            {{ $alumno->Carrera }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $alumno->Correo }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $alumno->Telefono }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
