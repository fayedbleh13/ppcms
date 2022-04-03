<div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        @if(Session::has('msg'))
        <div class="alert alert-success" role="alert">
          {{Session::get('msg')}}
        </div>
         @endif
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="coupon-tab" data-toggle="tab" href="#coupon" role="tab" aria-controls="coupon" aria-selected="true">Coupons</a>
            </li>
            {{-- <li class="nav-item" role="presentation">
                <a class="nav-link" id="usedcoupon-tab" data-toggle="tab" href="#usedcoupon" role="tab" aria-controls="usedcoupon" aria-selected="false">Used Coupons</a>
            </li> --}}
            
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="coupon" role="tabpanel" aria-labelledby="coupon-tab">
                
              <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between mb-2">
                      <h1>Coupon List</h1>
                      {{--button class="btn btn-sm btn-primary mt-2" wire:click="openAddCouponModal()">Add New Coupon</button>--}}
                      <a href="/admin/add-coupon" class="btn btn-sm btn-primary">Add new Coupon</a>
                    </div>
                </div>
                <div class="card-body">
                  <table class="table table-bordered table-sm" id="coupons_table">
                    <thead class="bg-dark">
                      <tr>
                        <th>Coupon Code</th>
                        <th>Coupon Type</th>
                        <th>Coupon Value</th>
                        <th>Cart Value</th>
                        <th>Quantity</th>
                        <th>Expiry Date</th>
                        <th>Date Added</th>
                        <th width="10%">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($coupons as $coupon)
                        <tr>
                          <td>{{$coupon->code}}</td>
                          <td>{{$coupon->type}}</td>
                          @if ($coupon->type == 'fixed')
                            <td>₱{{$coupon->value}}</td>
                          @else
                            <td>{{$coupon->value}}%</td>
                          @endif
                          <td>{{$coupon->cart_value}}</td>
                          <td>{{ $coupon->quantity }}</td>
                          <td>{{$coupon->expiry_date}}</td>
                          <td>{{ $coupon->created_at }}</td>
                          <td>
                            {{-- <button wire:click="editCoupon({{ $coupon->id }})" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button> --}}
                            <a href="{{ route('admin.edit-coupon', ['coupon_id'=>$coupon->id]) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                            <a href="#" wire:click="deleteCoupon({{$coupon->id}})" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{ $coupons->links() }}
                </div>
              </div>
            </div>
            {{-- <div class="tab-pane fade" id="usedcoupon" role="tabpanel" aria-labelledby="usedcoupon-tab">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between mb-2">
                          <h1>Used Coupon List</h1>
                        </div>
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered table-sm" id="coupons_report">
                        <thead class="bg-dark">
                          <tr>
                            <th>Coupon Code</th>
                            <th>Coupons Left</th>
                            <th>Expiry Date</th>
                            <th>Coupons Used</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($ord as $o)
                            <tr>
                                <td>{{ $o->coupon->code }}</td>
                                <td>{{ $o->coupon->quantity }}</td>
                                <td>{{ $o->coupon->expiry_date }}</td>
                                <td>{{ $o->quantity }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" style="text-align: right; padding-right: 5px;">Total Used Coupons: </th>
                            <th> {{ $total }} Pc(s)</th>
                        </tr>
                    </tfoot>
                      </table>
                      {{ $coupons->links() }}
                    </div>
                  </div>
            </div> --}}
        </div>

       

        {{-- ADD COUPON MODAL START --}}
        <div class="modal fade addCouponModal" wire:ignore.self data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-center w-100 h4" id="staticBackdropLabel">Add Coupon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form wire:submit.prevent="addCoupon">
                <div class="modal-body">
                  <div class="form-group">
                    <label>Coupon code</label>
                    <input type="text" class="form-control" placeholder="Category code" wire:model="code">
                    <span class="text-danger">@error('code')
                      {{ $message }}
                    @enderror</span>
                  </div>

                  <div class="form-group">
                    <label>Coupon type</label>
                    <select class="form-control" wire:model="type">
                      <option value="">Select type</option>
                      <option value="fixed">Fixed</option>
                      <option value="percent">Percent</option>
                    </select>
                    <span class="text-danger">@error('type')
                      {{ $message }}
                    @enderror</span>
                  </div>

                  <div class="form-group">
                    <label>Coupon Value</label>
                    <input type="text" class="form-control" placeholder="Coupon Value" wire:model="value">
                    <span class="text-danger">@error('value')
                      {{ $message }}
                    @enderror</span>
                  </div>

                  <div class="form-group">
                    <label>Cart Value</label>
                    <input type="text" class="form-control" placeholder="Cart Value" wire:model="cart_value">
                    <span class="text-danger">@error('cart_value')
                      {{ $message }}
                    @enderror</span>
                  </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-sm btn-primary">Add</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        {{-- ADD COUPON MODAL END --}}

        {{-- UPDATE COUPON MODAL START --}}
        <div class="modal fade updateCouponModal" wire:ignore.self data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-center w-100 h4" id="staticBackdropLabel">Update Coupon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form wire:submit.prevent="updateCoupon">
                <input type="hidden" wire:model="coupon_id">
                <div class="modal-body">
                  <div class="form-group">
                    <label>Coupon code</label>
                    <input type="text" class="form-control" placeholder="Category code" wire:model="code">
                    <span class="text-danger">@error('code')
                      {{ $message }}
                    @enderror</span>
                  </div>

                  <div class="form-group">
                    <label>Coupon type</label>
                    <select class="form-control" wire:model="type">
                      <option value="">Select type</option>
                      <option value="fixed">Fixed</option>
                      <option value="percent">Percent</option>
                    </select>
                    <span class="text-danger">@error('type')
                      {{ $message }}
                    @enderror</span>
                  </div>

                  <div class="form-group">
                    <label>Coupon Value</label>
                    <input type="text" class="form-control" placeholder="Coupon Value" wire:model="value">
                    <span class="text-danger">@error('value')
                      {{ $message }}
                    @enderror</span>
                  </div>

                  <div class="form-group">
                    <label>Cart Value</label>
                    <input type="text" class="form-control" placeholder="Cart Value" wire:model="cart_value">
                    <span class="text-danger">@error('cart_value')
                      {{ $message }}
                    @enderror</span>
                  </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        {{-- UPDATE COUPON MODAL END --}}
    </div>
  </div>
</div>
