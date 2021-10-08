<?php
// This file was auto-generated from sdk-root/src/data/snow-device-management/2021-08-04/docs-2.json
return [ 'version' => '2.0', 'service' => '<p>Amazon Web Services Snow Device Management documentation.</p>', 'operations' => [ 'CancelTask' => '<p>Sends a cancel request for a specified task. You can cancel a task only if it\'s still in a <code>QUEUED</code> state. Tasks that are already running can\'t be cancelled.</p> <note> <p>A task might still run if it\'s processed from the queue before the <code>CancelTask</code> operation changes the task\'s state.</p> </note>', 'CreateTask' => '<p>Instructs one or more devices to start a task, such as unlocking or rebooting.</p>', 'DescribeDevice' => '<p>Checks device-specific information, such as the device type, software version, IP addresses, and lock status.</p>', 'DescribeDeviceEc2Instances' => '<p>Checks the current state of the Amazon EC2 instances. The output is similar to <code>describeDevice</code>, but the results are sourced from the device cache in the Amazon Web Services Cloud and include a subset of the available fields. </p>', 'DescribeExecution' => '<p>Checks the status of a remote task running on one or more target devices.</p>', 'DescribeTask' => '<p>Checks the metadata for a given task on a device. </p>', 'ListDeviceResources' => '<p>Returns a list of the Amazon Web Services resources available for a device. Currently, Amazon EC2 instances are the only supported resource type.</p>', 'ListDevices' => '<p>Returns a list of all devices on your Amazon Web Services account that have Amazon Web Services Snow Device Management enabled in the Amazon Web Services Region where the command is run.</p>', 'ListExecutions' => '<p>Returns the status of tasks for one or more target devices.</p>', 'ListTagsForResource' => '<p>Returns a list of tags for a managed device or task.</p>', 'ListTasks' => '<p>Returns a list of tasks that can be filtered by state.</p>', 'TagResource' => '<p>Adds or replaces tags on a device or task.</p>', 'UntagResource' => '<p>Removes a tag from a device or task.</p>', ], 'shapes' => [ 'AccessDeniedException' => [ 'base' => '<p>You don\'t have sufficient access to perform this action.</p>', 'refs' => [], ], 'AttachmentStatus' => [ 'base' => NULL, 'refs' => [ 'EbsInstanceBlockDevice$status' => '<p>The attachment state.</p>', ], ], 'Boolean' => [ 'base' => NULL, 'refs' => [ 'EbsInstanceBlockDevice$deleteOnTermination' => '<p>A value that indicates whether the volume is deleted on instance termination.</p>', ], ], 'CancelTaskInput' => [ 'base' => NULL, 'refs' => [], ], 'CancelTaskOutput' => [ 'base' => NULL, 'refs' => [], ], 'Capacity' => [ 'base' => '<p>The physical capacity of the Amazon Web Services Snow Family device. </p>', 'refs' => [ 'CapacityList$member' => NULL, ], ], 'CapacityList' => [ 'base' => NULL, 'refs' => [ 'DescribeDeviceOutput$deviceCapacities' => '<p>The hardware specifications of the device. </p>', ], ], 'CapacityNameString' => [ 'base' => NULL, 'refs' => [ 'Capacity$name' => '<p>The name of the type of capacity, such as memory.</p>', ], ], 'CapacityUnitString' => [ 'base' => NULL, 'refs' => [ 'Capacity$unit' => '<p>The unit of measure for the type of capacity.</p>', ], ], 'Command' => [ 'base' => '<p>The command given to the device to execute.</p>', 'refs' => [ 'CreateTaskInput$command' => '<p>The task to be performed. Only one task is executed on a device at a time.</p>', ], ], 'CpuOptions' => [ 'base' => '<p>The options for how a device\'s CPU is configured.</p>', 'refs' => [ 'Instance$cpuOptions' => '<p>The CPU options for the instance.</p>', ], ], 'CreateTaskInput' => [ 'base' => NULL, 'refs' => [], ], 'CreateTaskOutput' => [ 'base' => NULL, 'refs' => [], ], 'DescribeDeviceEc2Input' => [ 'base' => NULL, 'refs' => [], ], 'DescribeDeviceEc2Output' => [ 'base' => NULL, 'refs' => [], ], 'DescribeDeviceInput' => [ 'base' => NULL, 'refs' => [], ], 'DescribeDeviceOutput' => [ 'base' => NULL, 'refs' => [], ], 'DescribeExecutionInput' => [ 'base' => NULL, 'refs' => [], ], 'DescribeExecutionOutput' => [ 'base' => NULL, 'refs' => [], ], 'DescribeTaskInput' => [ 'base' => NULL, 'refs' => [], ], 'DescribeTaskOutput' => [ 'base' => NULL, 'refs' => [], ], 'DeviceSummary' => [ 'base' => '<p>Identifying information about the device.</p>', 'refs' => [ 'DeviceSummaryList$member' => NULL, ], ], 'DeviceSummaryList' => [ 'base' => NULL, 'refs' => [ 'ListDevicesOutput$devices' => '<p>A list of device structures that contain information about the device.</p>', ], ], 'EbsInstanceBlockDevice' => [ 'base' => '<p>Describes a parameter used to set up an Amazon Elastic Block Store (Amazon EBS) volume in a block device mapping.</p>', 'refs' => [ 'InstanceBlockDeviceMapping$ebs' => '<p>The parameters used to automatically set up Amazon Elastic Block Store (Amazon EBS) volumes when the instance is launched. </p>', ], ], 'ExecutionId' => [ 'base' => NULL, 'refs' => [ 'DescribeExecutionOutput$executionId' => '<p>The ID of the execution.</p>', 'ExecutionSummary$executionId' => '<p>The ID of the execution.</p>', ], ], 'ExecutionState' => [ 'base' => NULL, 'refs' => [ 'DescribeExecutionOutput$state' => '<p>The current state of the execution.</p>', 'ExecutionSummary$state' => '<p>The state of the execution.</p>', 'ListExecutionsInput$state' => '<p>A structure used to filter the tasks by their current state.</p>', ], ], 'ExecutionSummary' => [ 'base' => '<p>The summary of a task execution on a specified device.</p>', 'refs' => [ 'ExecutionSummaryList$member' => NULL, ], ], 'ExecutionSummaryList' => [ 'base' => NULL, 'refs' => [ 'ListExecutionsOutput$executions' => '<p>A list of executions. Each execution contains the task ID, the device that the task is executing on, the execution ID, and the status of the execution.</p>', ], ], 'IdempotencyToken' => [ 'base' => NULL, 'refs' => [ 'CreateTaskInput$clientToken' => '<p>A token ensuring that the action is called only once with the specified details.</p>', ], ], 'Instance' => [ 'base' => '<p>The description of an instance. Currently, Amazon EC2 instances are the only supported instance type.</p>', 'refs' => [ 'InstanceSummary$instance' => '<p>A structure containing details about the instance.</p>', ], ], 'InstanceBlockDeviceMapping' => [ 'base' => '<p>The description of a block device mapping.</p>', 'refs' => [ 'InstanceBlockDeviceMappingList$member' => NULL, ], ], 'InstanceBlockDeviceMappingList' => [ 'base' => NULL, 'refs' => [ 'Instance$blockDeviceMappings' => '<p>Any block device mapping entries for the instance.</p>', ], ], 'InstanceIdsList' => [ 'base' => NULL, 'refs' => [ 'DescribeDeviceEc2Input$instanceIds' => '<p>A list of instance IDs associated with the managed device.</p>', ], ], 'InstanceState' => [ 'base' => '<p>The description of the current state of an instance.</p>', 'refs' => [ 'Instance$state' => NULL, ], ], 'InstanceStateName' => [ 'base' => NULL, 'refs' => [ 'InstanceState$name' => '<p>The current state of the instance.</p>', ], ], 'InstanceSummary' => [ 'base' => '<p>The details about the instance.</p>', 'refs' => [ 'InstanceSummaryList$member' => NULL, ], ], 'InstanceSummaryList' => [ 'base' => NULL, 'refs' => [ 'DescribeDeviceEc2Output$instances' => '<p>A list of structures containing information about each instance. </p>', ], ], 'Integer' => [ 'base' => NULL, 'refs' => [ 'CpuOptions$coreCount' => '<p>The number of cores that the CPU can use.</p>', 'CpuOptions$threadsPerCore' => '<p>The number of threads per core in the CPU.</p>', 'Instance$amiLaunchIndex' => '<p>The Amazon Machine Image (AMI) launch index, which you can use to find this instance in the launch group. </p>', 'InstanceState$code' => '<p>The state of the instance as a 16-bit unsigned integer. </p> <p>The high byte is all of the bits between 2^8 and (2^16)-1, which equals decimal values between 256 and 65,535. These numerical values are used for internal purposes and should be ignored. </p> <p>The low byte is all of the bits between 2^0 and (2^8)-1, which equals decimal values between 0 and 255. </p> <p>The valid values for the instance state code are all in the range of the low byte. These values are: </p> <ul> <li> <p> <code>0</code> : <code>pending</code> </p> </li> <li> <p> <code>16</code> : <code>running</code> </p> </li> <li> <p> <code>32</code> : <code>shutting-down</code> </p> </li> <li> <p> <code>48</code> : <code>terminated</code> </p> </li> <li> <p> <code>64</code> : <code>stopping</code> </p> </li> <li> <p> <code>80</code> : <code>stopped</code> </p> </li> </ul> <p>You can ignore the high byte value by zeroing out all of the bits above 2^8 or 256 in decimal. </p>', ], ], 'InternalServerException' => [ 'base' => '<p>An unexpected error occurred while processing the request.</p>', 'refs' => [], ], 'IpAddressAssignment' => [ 'base' => NULL, 'refs' => [ 'PhysicalNetworkInterface$ipAddressAssignment' => '<p>A value that describes whether the IP address is dynamic or persistent.</p>', ], ], 'JobId' => [ 'base' => NULL, 'refs' => [ 'ListDevicesInput$jobId' => '<p>The ID of the job used to order the device.</p>', ], ], 'ListDeviceResourcesInput' => [ 'base' => NULL, 'refs' => [], ], 'ListDeviceResourcesInputTypeString' => [ 'base' => NULL, 'refs' => [ 'ListDeviceResourcesInput$type' => '<p>A structure used to filter the results by type of resource.</p>', ], ], 'ListDeviceResourcesOutput' => [ 'base' => NULL, 'refs' => [], ], 'ListDevicesInput' => [ 'base' => NULL, 'refs' => [], ], 'ListDevicesOutput' => [ 'base' => NULL, 'refs' => [], ], 'ListExecutionsInput' => [ 'base' => NULL, 'refs' => [], ], 'ListExecutionsOutput' => [ 'base' => NULL, 'refs' => [], ], 'ListTagsForResourceInput' => [ 'base' => NULL, 'refs' => [], ], 'ListTagsForResourceOutput' => [ 'base' => NULL, 'refs' => [], ], 'ListTasksInput' => [ 'base' => NULL, 'refs' => [], ], 'ListTasksOutput' => [ 'base' => NULL, 'refs' => [], ], 'Long' => [ 'base' => NULL, 'refs' => [ 'Capacity$available' => '<p>The amount of capacity available for use on the device.</p>', 'Capacity$total' => '<p>The total capacity on the device.</p>', 'Capacity$used' => '<p>The amount of capacity used on the device.</p>', ], ], 'ManagedDeviceId' => [ 'base' => NULL, 'refs' => [ 'DescribeDeviceEc2Input$managedDeviceId' => '<p>The ID of the managed device.</p>', 'DescribeDeviceInput$managedDeviceId' => '<p>The ID of the device that you are checking the information of.</p>', 'DescribeDeviceOutput$managedDeviceId' => '<p>The ID of the device that you checked the information for.</p>', 'DescribeExecutionInput$managedDeviceId' => '<p>The ID of the managed device.</p>', 'DescribeExecutionOutput$managedDeviceId' => '<p>The ID of the managed device that the task is being executed on.</p>', 'DeviceSummary$managedDeviceId' => '<p>The ID of the device.</p>', 'ExecutionSummary$managedDeviceId' => '<p>The ID of the managed device that the task is being executed on.</p>', 'ListDeviceResourcesInput$managedDeviceId' => '<p>The ID of the managed device that you are listing the resources of.</p>', ], ], 'MaxResults' => [ 'base' => NULL, 'refs' => [ 'ListDeviceResourcesInput$maxResults' => '<p>The maximum number of resources per page.</p>', 'ListDevicesInput$maxResults' => '<p>The maximum number of devices to list per page.</p>', 'ListExecutionsInput$maxResults' => '<p>The maximum number of tasks to list per page.</p>', 'ListTasksInput$maxResults' => '<p>The maximum number of tasks per page.</p>', ], ], 'NextToken' => [ 'base' => NULL, 'refs' => [ 'ListDeviceResourcesInput$nextToken' => '<p>A pagination token to continue to the next page of results.</p>', 'ListDeviceResourcesOutput$nextToken' => '<p>A pagination token to continue to the next page of results.</p>', 'ListDevicesInput$nextToken' => '<p>A pagination token to continue to the next page of results.</p>', 'ListDevicesOutput$nextToken' => '<p>A pagination token to continue to the next page of devices.</p>', 'ListExecutionsInput$nextToken' => '<p>A pagination token to continue to the next page of tasks.</p>', 'ListExecutionsOutput$nextToken' => '<p>A pagination token to continue to the next page of executions.</p>', 'ListTasksInput$nextToken' => '<p>A pagination token to continue to the next page of tasks.</p>', 'ListTasksOutput$nextToken' => '<p>A pagination token to continue to the next page of tasks.</p>', ], ], 'PhysicalConnectorType' => [ 'base' => NULL, 'refs' => [ 'PhysicalNetworkInterface$physicalConnectorType' => '<p>The physical connector type.</p>', ], ], 'PhysicalNetworkInterface' => [ 'base' => '<p>The details about the physical network interface for the device.</p>', 'refs' => [ 'PhysicalNetworkInterfaceList$member' => NULL, ], ], 'PhysicalNetworkInterfaceList' => [ 'base' => NULL, 'refs' => [ 'DescribeDeviceOutput$physicalNetworkInterfaces' => '<p>The network interfaces available on the device.</p>', ], ], 'Reboot' => [ 'base' => '<p>A structure used to reboot the device.</p>', 'refs' => [ 'Command$reboot' => '<p>Reboots the device.</p>', ], ], 'ResourceNotFoundException' => [ 'base' => '<p>The request references a resource that doesn\'t exist.</p>', 'refs' => [], ], 'ResourceSummary' => [ 'base' => '<p>A summary of a resource available on the device.</p>', 'refs' => [ 'ResourceSummaryList$member' => NULL, ], ], 'ResourceSummaryList' => [ 'base' => NULL, 'refs' => [ 'ListDeviceResourcesOutput$resources' => '<p>A structure defining the resource\'s type, Amazon Resource Name (ARN), and ID.</p>', ], ], 'SecurityGroupIdentifier' => [ 'base' => '<p>Information about the device\'s security group.</p>', 'refs' => [ 'SecurityGroupIdentifierList$member' => NULL, ], ], 'SecurityGroupIdentifierList' => [ 'base' => NULL, 'refs' => [ 'Instance$securityGroups' => '<p>The security groups for the instance.</p>', ], ], 'ServiceQuotaExceededException' => [ 'base' => '<p>The request would cause a service quota to be exceeded.</p>', 'refs' => [], ], 'SoftwareInformation' => [ 'base' => '<p>Information about the software on the device.</p>', 'refs' => [ 'DescribeDeviceOutput$software' => '<p>The software installed on the device.</p>', ], ], 'String' => [ 'base' => NULL, 'refs' => [ 'AccessDeniedException$message' => NULL, 'CancelTaskOutput$taskId' => '<p>The ID of the task that you are attempting to cancel.</p>', 'CreateTaskOutput$taskArn' => '<p>The Amazon Resource Name (ARN) of the task that you created.</p>', 'CreateTaskOutput$taskId' => '<p>The ID of the task that you created.</p>', 'DescribeDeviceOutput$associatedWithJob' => '<p>The ID of the job used when ordering the device.</p>', 'DescribeDeviceOutput$deviceType' => '<p>The type of Amazon Web Services Snow Family device.</p>', 'DescribeDeviceOutput$managedDeviceArn' => '<p>The Amazon Resource Name (ARN) of the device.</p>', 'DescribeTaskOutput$taskArn' => '<p>The Amazon Resource Name (ARN) of the task.</p>', 'DescribeTaskOutput$taskId' => '<p>The ID of the task.</p>', 'DeviceSummary$associatedWithJob' => '<p>The ID of the job used to order the device.</p>', 'DeviceSummary$managedDeviceArn' => '<p>The Amazon Resource Name (ARN) of the device.</p>', 'EbsInstanceBlockDevice$volumeId' => '<p>The ID of the Amazon EBS volume.</p>', 'Instance$imageId' => '<p>The ID of the AMI used to launch the instance.</p>', 'Instance$instanceId' => '<p>The ID of the instance.</p>', 'Instance$instanceType' => '<p>The instance type.</p>', 'Instance$privateIpAddress' => '<p>The private IPv4 address assigned to the instance.</p>', 'Instance$publicIpAddress' => '<p>The public IPv4 address assigned to the instance.</p>', 'Instance$rootDeviceName' => '<p>The device name of the root device volume (for example, <code>/dev/sda1</code>). </p>', 'InstanceBlockDeviceMapping$deviceName' => '<p>The block device name.</p>', 'InstanceIdsList$member' => NULL, 'InternalServerException$message' => NULL, 'ListTagsForResourceInput$resourceArn' => '<p>The Amazon Resource Name (ARN) of the device or task.</p>', 'PhysicalNetworkInterface$defaultGateway' => '<p>The default gateway of the device.</p>', 'PhysicalNetworkInterface$ipAddress' => '<p>The IP address of the device.</p>', 'PhysicalNetworkInterface$macAddress' => '<p>The MAC address of the device.</p>', 'PhysicalNetworkInterface$netmask' => '<p>The netmask used to divide the IP address into subnets.</p>', 'PhysicalNetworkInterface$physicalNetworkInterfaceId' => '<p>The physical network interface ID.</p>', 'ResourceNotFoundException$message' => NULL, 'ResourceSummary$arn' => '<p>The Amazon Resource Name (ARN) of the resource.</p>', 'ResourceSummary$id' => '<p>The ID of the resource.</p>', 'ResourceSummary$resourceType' => '<p>The resource type.</p>', 'SecurityGroupIdentifier$groupId' => '<p>The security group ID.</p>', 'SecurityGroupIdentifier$groupName' => '<p>The security group name.</p>', 'ServiceQuotaExceededException$message' => NULL, 'SoftwareInformation$installState' => '<p>The state of the software that is installed or that is being installed on the device.</p>', 'SoftwareInformation$installedVersion' => '<p>The version of the software currently installed on the device.</p>', 'SoftwareInformation$installingVersion' => '<p>The version of the software being installed on the device.</p>', 'TagKeys$member' => NULL, 'TagMap$key' => NULL, 'TagMap$value' => NULL, 'TagResourceInput$resourceArn' => '<p>The Amazon Resource Name (ARN) of the device or task.</p>', 'TargetList$member' => NULL, 'TaskSummary$taskArn' => '<p>The Amazon Resource Name (ARN) of the task.</p>', 'ThrottlingException$message' => NULL, 'UntagResourceInput$resourceArn' => '<p>The Amazon Resource Name (ARN) of the device or task.</p>', 'ValidationException$message' => NULL, ], ], 'TagKeys' => [ 'base' => NULL, 'refs' => [ 'UntagResourceInput$tagKeys' => '<p>Optional metadata that you assign to a resource. You can use tags to categorize a resource in different ways, such as by purpose, owner, or environment.</p>', ], ], 'TagMap' => [ 'base' => NULL, 'refs' => [ 'CreateTaskInput$tags' => '<p>Optional metadata that you assign to a resource. You can use tags to categorize a resource in different ways, such as by purpose, owner, or environment. </p>', 'DescribeDeviceOutput$tags' => '<p>Optional metadata that you assign to a resource. You can use tags to categorize a resource in different ways, such as by purpose, owner, or environment. </p>', 'DescribeTaskOutput$tags' => '<p>Optional metadata that you assign to a resource. You can use tags to categorize a resource in different ways, such as by purpose, owner, or environment.</p>', 'DeviceSummary$tags' => '<p>Optional metadata that you assign to a resource. You can use tags to categorize a resource in different ways, such as by purpose, owner, or environment.</p>', 'ListTagsForResourceOutput$tags' => '<p>The list of tags for the device or task.</p>', 'TagResourceInput$tags' => '<p>Optional metadata that you assign to a resource. You can use tags to categorize a resource in different ways, such as by purpose, owner, or environment.</p>', 'TaskSummary$tags' => '<p>Optional metadata that you assign to a resource. You can use tags to categorize a resource in different ways, such as by purpose, owner, or environment.</p>', ], ], 'TagResourceInput' => [ 'base' => NULL, 'refs' => [], ], 'TargetList' => [ 'base' => NULL, 'refs' => [ 'CreateTaskInput$targets' => '<p>A list of managed device IDs.</p>', 'DescribeTaskOutput$targets' => '<p>The managed devices that the task was sent to.</p>', ], ], 'TaskDescriptionString' => [ 'base' => NULL, 'refs' => [ 'CreateTaskInput$description' => '<p>A description of the task and its targets.</p>', 'DescribeTaskOutput$description' => '<p>The description provided of the task and managed devices.</p>', ], ], 'TaskId' => [ 'base' => NULL, 'refs' => [ 'CancelTaskInput$taskId' => '<p>The ID of the task that you are attempting to cancel. You can retrieve a task ID by using the <code>ListTasks</code> operation.</p>', 'DescribeExecutionInput$taskId' => '<p>The ID of the task that the action is describing.</p>', 'DescribeExecutionOutput$taskId' => '<p>The ID of the task being executed on the device.</p>', 'DescribeTaskInput$taskId' => '<p>The ID of the task to be described.</p>', 'ExecutionSummary$taskId' => '<p>The ID of the task.</p>', 'ListExecutionsInput$taskId' => '<p>The ID of the task.</p>', 'TaskSummary$taskId' => '<p>The task ID.</p>', ], ], 'TaskState' => [ 'base' => NULL, 'refs' => [ 'DescribeTaskOutput$state' => '<p>The current state of the task.</p>', 'ListTasksInput$state' => '<p>A structure used to filter the list of tasks.</p>', 'TaskSummary$state' => '<p>The state of the task assigned to one or many devices.</p>', ], ], 'TaskSummary' => [ 'base' => '<p>Information about the task assigned to one or many devices.</p>', 'refs' => [ 'TaskSummaryList$member' => NULL, ], ], 'TaskSummaryList' => [ 'base' => NULL, 'refs' => [ 'ListTasksOutput$tasks' => '<p>A list of task structures containing details about each task.</p>', ], ], 'ThrottlingException' => [ 'base' => '<p>The request was denied due to request throttling.</p>', 'refs' => [], ], 'Timestamp' => [ 'base' => NULL, 'refs' => [ 'DescribeDeviceOutput$lastReachedOutAt' => '<p>When the device last contacted the Amazon Web Services Cloud. Indicates that the device is online.</p>', 'DescribeDeviceOutput$lastUpdatedAt' => '<p>When the device last pushed an update to the Amazon Web Services Cloud. Indicates when the device cache was refreshed.</p>', 'DescribeExecutionOutput$lastUpdatedAt' => '<p>When the status of the execution was last updated.</p>', 'DescribeExecutionOutput$startedAt' => '<p>When the execution began.</p>', 'DescribeTaskOutput$completedAt' => '<p>When the task was completed.</p>', 'DescribeTaskOutput$createdAt' => '<p>When the <code>CreateTask</code> operation was called.</p>', 'DescribeTaskOutput$lastUpdatedAt' => '<p>When the state of the task was last updated.</p>', 'EbsInstanceBlockDevice$attachTime' => '<p>When the attachment was initiated.</p>', 'Instance$createdAt' => '<p>When the instance was created.</p>', 'Instance$updatedAt' => '<p>When the instance was last updated.</p>', 'InstanceSummary$lastUpdatedAt' => '<p>When the instance summary was last updated.</p>', ], ], 'Unlock' => [ 'base' => '<p>A structure used to unlock a device.</p>', 'refs' => [ 'Command$unlock' => '<p>Unlocks the device.</p>', ], ], 'UnlockState' => [ 'base' => NULL, 'refs' => [ 'DescribeDeviceOutput$deviceState' => '<p>The current state of the device.</p>', ], ], 'UntagResourceInput' => [ 'base' => NULL, 'refs' => [], ], 'ValidationException' => [ 'base' => '<p>The input fails to satisfy the constraints specified by an Amazon Web Services service.</p>', 'refs' => [], ], ],];
