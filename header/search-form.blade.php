  <div class="dez-quik-search bg-primary">
                        <form action="/search" method="post">
                            @csrf
                            <input name="keyword"  type="text" class="form-control" placeholder="Tulis kata kunci...">
                            <span  id="quik-search-remove"><i class="fas fa-times"></i></span>
                        </form>
</div>