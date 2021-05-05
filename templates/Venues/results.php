<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking[]|\Cake\Collection\CollectionInterface $venues
 */

//echo debug($location);
//echo $location;
//echo $date;
//echo $numPeople;
//debug($this->request->getParam('pass'));



?>


<tbody>
<?php foreach ($venues as $venue): ?>
    <div class="table-responsive">
        <!-- Page Content -->
        <div class="container">

            <!-- Venue-->
            <div class="row">
                <div class="col-md-7">
                    <a href="#">
                        <td><?= $this->Html->image($venue->image, ["style"=>"width:700px;height:300px;object-fit: cover", 'class' =>"img-fluid rounded mb-3 mb-md-0"]) ?></td>

                    </a>

                </div>
                <div class="col-md-5">
                    <h3><td><?= h($venue->name) ?></td></h3>
                    <p><td><?= h($venue->description) ?></td></p>
                    <p class="text-muted font-weight-bold"> <td><?= h($venue->street_address) ?></td>
                    <td><?= h($venue->suburb) ?></td>
                    <td><?= h($venue->state) ?></td>
                    <td><?= h($venue->postcode) ?></td></p>
                        <p class="list-inline-item float-left"><i class="fas fa-users fa-2x"></i></p>
                        <p class="list-inline-item font-weight-bold float-left"><td><?= $this->Number->format($venue->capacity) ?></td></p>
                        <p class="list-inline-item float-right"><?= $this->Html->link(__('Take a Look'), ['action' => 'profile', $venue->id],['class'=>'btn btn-primary']) ?></p>

                </div>
            </div>
            <!-- /.row -->

            <hr>


            <!-- Pagination
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>-->

        </div>
        <!-- /.container -->
    </div>





<?php endforeach; ?>
</tbody>
