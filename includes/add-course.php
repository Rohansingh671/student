<div class="modal fade" id="add_class">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Course</h4>
                        <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="ti ti-x"></i>
                        </button>
                    </div>
                    <form action="php/addClass.php" method="POST">
                        <div class="modal-body">
                            <div class="row">
                                <?php
                                require_once 'php/databaseConnection.php';

                                $mysqli = db_connect();

                                $result = $mysqli->query("SELECT classID FROM classdata ORDER BY ID DESC LIMIT 1");
                                $row = $result->fetch_row();

                                if ($row == null) {
                                    $total_class_id = 1; // Initialize $total_class_id here for the case where no rows are found
                                } else {
                                    $class_id = substr($row[0], 3);
                                    $total_class_id = $class_id + 1; // Correct variable used here
                                }
                                ?>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Course ID</label>
                                        <input type="text" class="form-control" name="classID" value="CID<?php echo $total_class_id ?>" readonly>
                                    </div>

                                <div class="mb-3">
                                    <label class="form-label">Course Name</label>
                                    <input type="text" class="form-control" name="className">
                                </div>
                                <div class="col-xxl col-xl-3 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="select" name="classStatus">
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
                    <button type="submit" class="btn btn-primary">Add Course</button>
                </div>
                </form>
            </div>
        </div>
    </div>
