<x-ruangadmin-layout>
    <x-slot name="title">
        Dahsboard
    </x-slot>

    <section class="row">
        <x-ruangadmin.card-sum 
            text="Total Customer" 
            value="22" 
            icon="users" 
            color="warning"
        />
        <x-ruangadmin.card-sum 
            text="Total Visitor" 
            value="1450" 
            icon="chart-line" 
            color="primary"
        />
        <x-ruangadmin.card-sum 
            text="Income" 
            value="$1200" 
            icon="money-bill" 
            color="success"
        />
        <x-ruangadmin.card-sum 
            text="Total Product" 
            value="42" 
            icon="box" 
            color="danger"
        />
    </section>

    <section class="row">
        {{-- log activity section --}}
        <div class="col-md-6">
            <x-ruangadmin.card>
                <x-slot name="title">
                    Log Activity
                </x-slot>
                <x-slot name="option">
                    <a href="#" class="btn btn-primary btn-sm">More</a>
                </x-slot>
                <table class="table">
                    <tbody>
                        {{-- @forelse($logs as $log)
                        <tr>
                            <td>{{ $log->description }}</td>
                            <td><small>{{ $log->created_at->diffForHumans() }}</small></td>
                        </tr>
                        @empty
                        <td colspan="2" class="text-center">No Data</td>
                        @endforelse --}}
                    </tbody>
                </table>
            </x-ruangadmin.card>
        </div>

        {{-- chart section --}}
        <div class="col-md-6">
            <!-- Area Charts -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
        </div>
    </section>

    <x-slot name="script">
        <script src="{{ asset('ruangadmin/dist/js/demo/chart-area-demo.js') }}"></script>
    </x-slot>
</x-ruangadmin-layout>