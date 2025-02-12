<div class="modal fade" id="add_fees_group">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Fees Group</h4>
                        <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="ti ti-x"></i>
                        </button>
                    </div>
                    <form action="php/addFeesGroup.php" method="POST">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    require_once 'php/databaseConnection.php';

                                    $mysqli = db_connect();

                                    $result = $mysqli->query("SELECT feesGroupID FROM addfeesgroup ORDER BY ID DESC LIMIT 1");
                                    $row = $result->fetch_row();

                                    if ($row == null) {
                                        $total_group_id = 1; // Initialize $total_group_id here for the case where no rows are found
                                    } else {
                                        $group_id = substr($row[0], 4); // Adjust substring length to skip "FGID"
                                        $total_group_id = $group_id + 1; // Increment the numeric part of the group ID
                                    }
                                    ?>
                                    <div class="mb-3">
                                        <label class="form-label">Group ID</label>
                                        <input type="text" class="form-control" name="feesGroupID" value="FGID<?php echo $total_group_id ?>" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Fees Group</label>
                                        <input type="text" class="form-control" name="feesGroup">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Fees Amount</label>
                                        <input type="text" class="form-control" name="feesGroupAmount" value="Rs &nbsp;">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" rows="4" name="remark" placeholder="The money you pay matters!!"></textarea>
                                    </div>
                                    <div class="col-xxl col-xl-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Status</label>
                                            <select class="select" name="feesGroupStatus">
                                                <option value="">Select</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-primary">Add Fees Group</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
