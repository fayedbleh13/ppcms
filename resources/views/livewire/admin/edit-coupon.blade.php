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
              <div class="card">
                  <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h1>Edit Coupon</h1>
                        <a href="/admin/coupon-list">Back</a>
                      </div>
                  </div>
                  <div class="card-body">
                    <form enctype="multipart/form-data" wire:submit.prevent="updateCoupon">
                        <div class="form-group">
                            <label>Coupon code</label>
                            <input type="text" class="form-control" placeholder="Category code" wire:model="code">
                        </div>

                        <div class="form-group">
                          <label>Coupon type</label>
                          <select class="form-control" wire:model="type">
                              <option value="" disabled>Select type</option>
                              <option value="fixed">Fixed</option>
                              <option value="percent">Percent</option>
                          </select>
                      </div>

                        <div class="form-group">
                            <label>Coupon Value</label>
                            <input type="text" class="form-control" placeholder="Coupon Value" wire:model="value">
                        </div>

                        <div class="form-group">
                          <label>Cart Value</label>
                          <input type="text" class="form-control" placeholder="Cart Value" wire:model="cart_value">
                      </div>
                      <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" class="form-control" placeholder="Quantity" wire:model="quantity">
                      </div>
                      <div class="form-group">
                        <label>Expiry Date</label>
                        <input type="date" class="form-control" placeholder="Expiry Date" wire:model="expiry_date">
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control">Update Coupon</button>
                    </div>
                      </form>
                  </div>
              </div>
          </div>
        </div>
    </div>
</div>
