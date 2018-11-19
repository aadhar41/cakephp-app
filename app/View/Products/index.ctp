<div class="panel-group text-muted">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapse1">FILTERS</a>
            </h4>
        </div>

        <div id="collapse1" class="panel-collapse collapse">
            <div class="panel-body">

                <?php
                    // The base url is the url where we'll pass the filter parameters
                    $base_url = array('controller' => 'products', 'action' => 'index');
                    echo $this->Form->create("Filter",array('url' => $base_url, 'class' => 'filter','id'=>'filter_form'));
                    
                    // add a select input for each filter. It's a good idea to add a empty value and set
                    // the default option to that.
                    
                    echo '<div class="col-lg-3">';            
                        // Add a basic search 
                        echo $this->Form->input("name", array('label' => 'Name', 'placeholder' => "Name...",'class'=>'form-control'));
                    echo '</div>';


                    echo '<div class="col-lg-3">';            
                        // Add a basic search 
                        echo $this->Form->input("price", array('label' => 'Price', 'placeholder' => "Price...",'class'=>'form-control'));
                    echo '</div>';            


                    echo '<div class="col-lg-3">';            
                            $status = array('1' => 'Active', '0' => 'De-active');
                            echo $this->Form->input(
                                'status',
                                array('options' => $status, 'default' => 'm','class'=>'form-control')
                            );
                    echo '</div>';            
                   

                    echo '<br>';
                        
                ?>

            </div>
            <div class="panel-footer">
                <?php
                    // To reset all the filters we only need to redirect to the base_url
               
                    echo "<div class='row'>";

                        echo "<div class='col-lg-1'>";
                            echo "<div class='submit actions row'>";
                                echo $this->Form->end(array(
                                    'label' => __('Filter'),
                                    'class' => 'btn btn-primary',
                                    'div' => array(
                                        'class' => 'control-group',
                                     ),
                                    'before' => '<div class="controls">',
                                    'after' => '</div>'
                                ));
                            echo "</div>";
                        echo "</div>";

                        echo "<div class='col-lg-1'>";
                            echo $this->Html->link("Reset",$base_url,array('class' => 'btn btn-primary'));
                        echo "</div>";

                    echo "</div>";
                ?>
            </div>
        </div>
    </div>
</div>





<div class="panel panel-default text-muted">
  <div class="panel-heading">
    <p>
        PRODUCTS
    </p>
  </div>

  <div class="panel-body">
    <div class="">
    <?php echo $this->Html->link("Add Product", array('action' => 'add'),array('class'=>'btn btn-primary pull-left')); ?>
    </div>

    <div class="col-lg-2">
        <?php 
            echo $this->Html->link(
                'Delete-all',
                '#',
                array('class' => 'btn btn-danger', 'onClick' => 'document.getElementById("form_delete_all").submit();')
            );
        ?> 
    </div>
    <br><br><br>

    <!-- Checkbox Delete All -->

    <?php
        $base_url = array('controller' => 'products', 'action' => 'deleteall');
        echo $this->Form->create("Delete All",array('url' => $base_url, 'class' => 'filter','id'=>'form_delete_all','type'=>'file'));
    ?>


    <table class="table table-hover ">

        <!-- Table heading with sorting columns -->
        <tr>
            <th><?php echo $this->Form->checkbox('select_all', array('id' => 'select_all','hiddenField' => false)); ?></th>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('price'); ?></th>
            <th><?php echo $this->Paginator->sort('category'); ?></th>
            <th>Status</th>
            <th><?php echo $this->Paginator->sort('created'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>

    <!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($products as $post): ?>
        <tr>
            <td>
                <?php 
                    echo $this->Form->checkbox('Product.'.$post['Product']['id'], array(
                      'value' => $post['Product']['id'],
                      'name' => 'product[]',
                      'class' => 'product',
                      'hiddenField' => false
                    ));
                ?>
            </td>

            <td><?php echo $post['Product']['id']; ?></td>
            <td>
                <?php 
                    echo $post['Product']['name']; 
                    if(!empty($post['Product']['image'])) {
                ?>
                    <span class="badge">Image</span>
                <?php
                    }
                ?>
            </td>
            
            <td><?php echo $post['Product']['price']; ?></td>
            <td>
                <?php
                    echo $this->Html->link(
                        $post['Product']['name'],
                        array('action' => 'view', $post['Product']['id'])
                    );
                ?>
            </td>
            
            <td>
                <?php 
                	if($post['Product']['status']==1) {
                		echo '<span class="label label-success">Active</span>';
                	} else {
                		echo '<span class="label label-danger">De-active</span>';
                	}
                ?>
            </td>
            <td>
                <?php 
                    // Instantiate a DateTime with microseconds.
                    $d = new DateTime($post['Product']['created']);

                    // Output the date with microseconds.
                    echo $d->format('M d, Y H:i:s'); // 2011-01-01T15:03:01.012345
                ?>
            </td>
            
            <td>

                <?php
                    /*
                    echo $this->Html->link(
                        'Edit',
                        array('action' => 'edit', $post['Product']['id']),
                    );
                    */

                    echo $this->Html->link(
                        $this->Html->tag('i', '', array('class' => 'fa fa-pencil')),
                        array('action' => 'edit', $post['Product']['id']),
                        array('class' => 'btn btn-default', 'escape' => false)
                    );
                ?>
                
                <!--
                    Using postLink() will create a link that uses JavaScript to do a POST request to delete our post. Allowing content to be deleted using GET requests is dangerous, as web crawlers could accidentally delete all your content.
                -->

                <?php
                    /*
                    echo $this->Form->postLink(
                        'Delete',
                        array('action' => 'delete', $post['Product']['id']),
                        array('confirm' => 'Are you sure?')
                    );
                    */

                    echo $this->Html->link(
                        $this->Html->tag('i', '', array('class' => 'fa fa-trash')),
                        array('action' => 'delete', $post['Product']['id']),
                        array('class' => 'btn btn-default', 'escape' => false,'confirm' => 'Are you sure?')
                    );


                ?>

                <?php
                    $pid = $post['Product']['id'];
                    echo $this->Form->button('', array(
                        'type' => 'button',
                        'class' => 'btn btn-default fa fa-eye',
                        'escape' => false,
                        'onClick'=>"previewDetails($pid)"
                    ));

                ?>

            </td>

        </tr>
    <?php endforeach; ?>
    
    </table>
    
    <?php 
        echo $this->Form->end();
        /*
        echo $this->Form->end(array(
            'label' => __('Delete All'),
            'class' => 'btn btn-primary',
            'div' => array(
                'class' => 'control-group',
             ),
            'before' => '<div class="controls">',
            'after' => '</div>'
        ));
        */
    ?>

    <!-- Pagination -->

    <div class="col-lg-12">
        <ul class="pagination pull-right">

        <?php 

            echo $this->Paginator->first(
                __(' << '),
                array('tag' => 'li','currentClass' => 'disabled'),
                null,
                array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')
            );


            echo $this->Paginator->prev(__(' prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));

            echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 2, 'last' => 2));

            echo $this->Paginator->next(
                __('next'), 
                array('tag' => 'li','currentClass' => 'disabled'), 
                null, 
                array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')
            );    


            echo $this->Paginator->last(
                __(' >> '),
                array('tag' => 'li','currentClass' => 'disabled'),
                null,
                array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')
            );    

        ?>
        </ul>
    </div>

    <div class="col-lg-12 text-right">
        <?php
            echo $this->Paginator->counter(array(
                'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total.')
            ));
        ?>
    </div>



    </div>
    </div>
    </div>

    <div id="div1"></div>

    <script>
        
        function previewDetails(id) {
            //alert(id);
            
            var data = {id: id};
            $.ajax({
                dataType: "html",
                type: "POST",
                evalScripts: true,
                url: '<?php echo Router::url(array('controller'=>'Products','action'=>'previewdetails'));?>',
                data: (data),
                success: function (data, textStatus){
                    console.log(data);
                    $("#div1").html(data);
                },
                error: function (xhr, status, errorThrown) {
                    var message;
                    var statusErrorMap = {
                        '400' : "Server understood the request, but request content was invalid.",
                        '401' : "Unauthorized access.",
                        '403' : "Forbidden resource can't be accessed. May be You should logged in to view this page.",
                        '500' : "Internal server error.",
                        '503' : "Service unavailable."
                    };

                    if (xhr.status) {
                        message = statusErrorMap[xhr.status];
                        if(!message) {
                            message="Unknown Error \n.";
                        }
                    } else if(errorThrown=='parsererror') {
                        message="Error.\nParsing JSON Request failed.";
                    } else if(errorThrown=='timeout') {
                        message="Request Time out.";
                    } else if(errorThrown=='abort') {
                        message="Request was aborted by the server";
                    } else {
                        message="Unknown Error \n.";
                    }
                    
                    alert(xhr.status+' : '+message);
                    //console.log(message);
                    
                }
            });
        }

    </script>

    <script>
        // For selecting all rows
        $("#select_all").click(function () {
            $(".product").prop('checked', $(this).prop('checked'));
        });
    </script>