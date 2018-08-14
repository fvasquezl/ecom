<!-- Modal -->
<div class="modal fade" id="createProductModal" tabindex="-1" role="dialog" aria-labelledby="createProductModalLabel"
     aria-hidden="true">
    {!! Form::open(['route' => ['admin.products.store','#create'],'method' => 'POST']) !!}
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createProductModalLabel">Create Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('name','Product Name') !!}
                    {!! Form::text('name', null, $attributes = $errors->has('name') ? array('placeholder' => 'Name', 'class' => 'form-control is-invalid') : array('placeholder' => 'Name', 'class' => 'form-control')) !!}

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>

        </div>
    </div>
    {!! Form::close() !!}
</div>

@push('scripts')
    <script>
        if (window.location.hash == '#create') {
            $('#createProductModal').modal('show');
        }
        $('#createProductModal').on('hide.bs.modal', function () {
            window.location.hash = '#';
        });
        $('#createProductModal').on('shown.bs.modal', function () {
            $('#name').focus();
            window.location.hash = '#create';
        });
    </script>
@endpush