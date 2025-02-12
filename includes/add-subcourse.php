<div class="modal fade" id="add_subject">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Sub-course</h4>
                        <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="ti ti-x"></i>
                        </button>
                    </div>
                    <form action="php/addSubject.php" method="POST">
                        <div class="modal-body">
                            <div class="row">
                                <?php
                                require_once 'php/databaseConnection.php';

                                $mysqli = db_connect();

                                $result = $mysqli->query("SELECT subject_id FROM addsubject ORDER BY ID DESC LIMIT 1");
                                $row = $result->fetch_row();

                                if ($row == null) {
                                    $total_subject_id = 1; // Initialize $total_subject_id here for the case where no rows are found
                                } else {
                                    $subject_id = substr($row[0], 5); // Adjust substring length to skip "SUBID"
                                    $total_subject_id = $subject_id + 1; // Increment the numeric part of the subject ID
                                }
                                ?>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Sub-course ID</label>
                                        <input type="text" class="form-control" name="subject_id" value="SUBID<?php echo $total_subject_id ?>" readonly>
                                    </div>

                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Code</label>
                                    <select class="select" name="code">
                                        <option>Select</option>
                                        <option>101</option>
                                        <option>102</option>
                                        <option>103</option>
                                        <option>104</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Type</label>
                                    <select class="select" name="type">
                                        <option>Select</option>
                                        <option>Theory</option>
                                        <option>Practical</option>
                                    </select>
                                </div>
                                <div class="col-xxl col-xl-3 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="select" name="status">
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
                    <button type="submit" class="btn btn-primary">Add Sub-course</button>
                </div>
                </form>
            </div>
        </div>
    </div>