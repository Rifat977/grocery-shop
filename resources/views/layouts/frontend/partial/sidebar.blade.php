<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav nav_1" style="border:none;">
						<style type="text/css">
							.ctr .ctra:hover{
								color: #fff !important;
							}
						</style>
						<li class="ctr"><a class="ctra">সবগুলো</a></li>
                    @foreach($dataCat as $dataB)
						<li><a href="/productAsCategory.html/{{ $dataB->id}}"> {{ $dataB->category}}</a></li>
                    @endforeach
					</ul>
</div>