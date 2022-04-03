<div>
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <a class="nav-link active" id="inventory-tab" data-toggle="tab" href="#inventory" role="tab" aria-controls="inventory" aria-selected="true">Inventory</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">History</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="inventory" role="tabpanel" aria-labelledby="inventory-tab">
                        <div class="card">
                            <div class="card-header">
                                <h1>Inventory report</h1>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-sm" id="inventory_table">
                                    <thead class="bg-dark">
                                        <th>Product</th>
                                        <th>Category</th>
                                        <th>SKU</th>
                                        <th>Current stock</th>
                                        <th>Unit sold</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($pro as $p)
                                            <tr>
                                                <td>{{ $p->product->name }}</td>
                                                <td>{{ $p->product->cat->name }}</td>
                                                <td>{{ $p->product->SKU }}</td>
                                                <td>@if ($p->product->quantity < 1)
                                                    <span class="text-danger">Out of stock</span>
                                                @else
                                                    {{ $p->product->quantity }} Pc(s)
                                                @endif
                                                </td>
                                                <td>{{ $p->quantity }} Pc(s)</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="4" style="text-align: right; padding-right: 5px;">Total Products Sold: </th>
                                            <th> {{ $total }} Pc(s)</th>
                                            
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                        <div class="card">
                            <div class="card-header">
                                <h1>Restock History</h1>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-sm" id="inventory_table">
                                    <thead class="bg-dark">
                                        <th>Product</th>
                                        <th>Category</th>
                                        <th>Restock Amount</th>
                                        <th>SKU</th>
                                        <th>Date Restocked</th>
                
                                    </thead>
                                    <tbody>
                                        @foreach ($inventory as $i)
                                           
                                                
                                            
                                            <tr>
                                                <td>{{ $i->product->name }}</td>
                                                <td>{{ $i->product->cat->name }}</td>
                                                <td>{{ $i->stock_qty }}</td>
                                                <td>{{ $i->product->SKU }}</td>
                                                <td>{{ date("d M Y", strtotime($i->restock_date)) }}</td>
                                               
                                            </tr>
                                           
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                  </div>

				
			</div>
		</div>
	</div>
</div>
