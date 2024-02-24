<!DOCTYPE html>
<html lang="en">
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Prestamo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('prestamo.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('prestamo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</html>
