<?php
// This file was auto-generated from sdk-root/src/data/schemas/2019-12-02/docs-2.json
return [ 'version' => '2.0', 'service' => '<p>Amazon EventBridge Schema Registry</p>', 'operations' => [ 'CreateDiscoverer' => '<p>Creates a discoverer.</p>', 'CreateRegistry' => '<p>Creates a registry.</p>', 'CreateSchema' => '<p>Creates a schema definition.</p> <note><p>Inactive schemas will be deleted after two years.</p></note>', 'DeleteDiscoverer' => '<p>Deletes a discoverer.</p>', 'DeleteRegistry' => '<p>Deletes a Registry.</p>', 'DeleteResourcePolicy' => '<p>Delete the resource-based policy attached to the specified registry.</p>', 'DeleteSchema' => '<p>Delete a schema definition.</p>', 'DeleteSchemaVersion' => '<p>Delete the schema version definition</p>', 'DescribeCodeBinding' => '<p>Describe the code binding URI.</p>', 'DescribeDiscoverer' => '<p>Describes the discoverer.</p>', 'DescribeRegistry' => '<p>Describes the registry.</p>', 'DescribeSchema' => '<p>Retrieve the schema definition.</p>', 'GetCodeBindingSource' => '<p>Get the code binding source URI.</p>', 'GetDiscoveredSchema' => '<p>Get the discovered schema that was generated based on sampled events.</p>', 'GetResourcePolicy' => '<p>Retrieves the resource-based policy attached to a given registry.</p>', 'ListDiscoverers' => '<p>List the discoverers.</p>', 'ListRegistries' => '<p>List the registries.</p>', 'ListSchemaVersions' => '<p>Provides a list of the schema versions and related information.</p>', 'ListSchemas' => '<p>List the schemas.</p>', 'ListTagsForResource' => '<p>Get tags for resource.</p>', 'PutCodeBinding' => '<p>Put code binding URI</p>', 'PutResourcePolicy' => '<p>The name of the policy.</p>', 'SearchSchemas' => '<p>Search the schemas</p>', 'StartDiscoverer' => '<p>Starts the discoverer</p>', 'StopDiscoverer' => '<p>Stops the discoverer</p>', 'TagResource' => '<p>Add tags to a resource.</p>', 'UntagResource' => '<p>Removes tags from a resource.</p>', 'UpdateDiscoverer' => '<p>Updates the discoverer</p>', 'UpdateRegistry' => '<p>Updates a registry.</p>', 'UpdateSchema' => '<p>Updates the schema definition</p> <note><p>Inactive schemas will be deleted after two years.</p></note>', 'ExportSchema' => '<p>Exports a schema to a different specification.</p>', ], 'shapes' => [ 'BadRequestException' => [ 'base' => NULL, 'refs' => [], ], 'CodeBindingOutput' => [ 'base' => NULL, 'refs' => [], ], 'CodeGenerationStatus' => [ 'base' => NULL, 'refs' => [ 'CodeBindingOutput$Status' => '<p>The current status of code binding generation.</p>', ], ], 'ConflictException' => [ 'base' => NULL, 'refs' => [], ], 'CreateDiscovererInput' => [ 'base' => NULL, 'refs' => [], ], 'CreateRegistryInput' => [ 'base' => NULL, 'refs' => [], ], 'CreateSchemaInput' => [ 'base' => NULL, 'refs' => [], ], 'DescribeSchemaOutput' => [ 'base' => NULL, 'refs' => [], ], 'DiscovererOutput' => [ 'base' => NULL, 'refs' => [], ], 'DiscovererState' => [ 'base' => NULL, 'refs' => [ 'DiscovererOutput$State' => '<p>The state of the discoverer.</p>', 'DiscovererStateOutput$State' => '<p>The state of the discoverer.</p>', 'DiscovererSummary$State' => '<p>The state of the discoverer.</p>', ], ], 'DiscovererStateOutput' => [ 'base' => NULL, 'refs' => [], ], 'DiscovererSummary' => [ 'base' => NULL, 'refs' => [ '__listOfDiscovererSummary$member' => NULL, ], ], 'ErrorOutput' => [ 'base' => NULL, 'refs' => [], ], 'ExportSchemaOutput' => [ 'base' => NULL, 'refs' => [], ], 'ForbiddenException' => [ 'base' => NULL, 'refs' => [], ], 'GetCodeBindingSourceOutput' => [ 'base' => NULL, 'refs' => [], ], 'GetDiscoveredSchemaInput' => [ 'base' => NULL, 'refs' => [], ], 'GetDiscoveredSchemaOutput' => [ 'base' => '<p></p>', 'refs' => [], ], 'GetDiscoveredSchemaVersionItemInput' => [ 'base' => NULL, 'refs' => [ '__listOfGetDiscoveredSchemaVersionItemInput$member' => NULL, ], ], 'GetResourcePolicyOutput' => [ 'base' => '<p>Information about the policy.</p>', 'refs' => [], ], 'GoneException' => [ 'base' => NULL, 'refs' => [], ], 'InternalServerErrorException' => [ 'base' => NULL, 'refs' => [], ], 'ListDiscoverersOutput' => [ 'base' => NULL, 'refs' => [], ], 'ListRegistriesOutput' => [ 'base' => '<p>List the registries.</p>', 'refs' => [], ], 'ListSchemaVersionsOutput' => [ 'base' => NULL, 'refs' => [], ], 'ListSchemasOutput' => [ 'base' => NULL, 'refs' => [], ], 'ListTagsForResourceOutput' => [ 'base' => NULL, 'refs' => [], ], 'NotFoundException' => [ 'base' => NULL, 'refs' => [], ], 'PreconditionFailedException' => [ 'base' => NULL, 'refs' => [], ], 'PutResourcePolicyInput' => [ 'base' => '<p>Only update the policy if the revision ID matches the ID that\'s specified. Use this option to avoid modifying a policy that has changed since you last read it.</p>', 'refs' => [], ], 'PutResourcePolicyOutput' => [ 'base' => '<p>The resource-based policy.</p>', 'refs' => [], ], 'RegistryOutput' => [ 'base' => NULL, 'refs' => [], ], 'RegistrySummary' => [ 'base' => NULL, 'refs' => [ '__listOfRegistrySummary$member' => NULL, ], ], 'SchemaOutput' => [ 'base' => NULL, 'refs' => [], ], 'SchemaSummary' => [ 'base' => '<p>A summary of schema details.</p>', 'refs' => [ '__listOfSchemaSummary$member' => NULL, ], ], 'SchemaVersionSummary' => [ 'base' => NULL, 'refs' => [ '__listOfSchemaVersionSummary$member' => NULL, ], ], 'SearchSchemaSummary' => [ 'base' => NULL, 'refs' => [ '__listOfSearchSchemaSummary$member' => NULL, ], ], 'SearchSchemaVersionSummary' => [ 'base' => NULL, 'refs' => [ '__listOfSearchSchemaVersionSummary$member' => NULL, ], ], 'SearchSchemasOutput' => [ 'base' => NULL, 'refs' => [], ], 'ServiceUnavailableException' => [ 'base' => NULL, 'refs' => [], ], 'TagResourceInput' => [ 'base' => NULL, 'refs' => [], ], 'Tags' => [ 'base' => '<p>Key-value pairs associated with a resource.</p>', 'refs' => [ 'CreateDiscovererInput$Tags' => '<p>Tags associated with the resource.</p>', 'CreateRegistryInput$Tags' => '<p>Tags to associate with the registry.</p>', 'CreateSchemaInput$Tags' => '<p>Tags associated with the schema.</p>', 'DescribeSchemaOutput$Tags' => '<p>Tags associated with the resource.</p>', 'DiscovererOutput$Tags' => '<p>Tags associated with the resource.</p>', 'DiscovererSummary$Tags' => '<p>Tags associated with the resource.</p>', 'ListTagsForResourceOutput$Tags' => NULL, 'RegistryOutput$Tags' => '<p>Tags associated with the registry.</p>', 'RegistrySummary$Tags' => '<p>Tags associated with the registry.</p>', 'SchemaOutput$Tags' => NULL, 'SchemaSummary$Tags' => '<p>Tags associated with the schema.</p>', 'TagResourceInput$Tags' => '<p>Tags associated with the resource.</p>', ], ], 'TooManyRequestsException' => [ 'base' => NULL, 'refs' => [], ], 'Type' => [ 'base' => NULL, 'refs' => [ 'CreateSchemaInput$Type' => '<p>The type of schema.</p>', 'GetDiscoveredSchemaInput$Type' => '<p>The type of event.</p>', 'UpdateSchemaInput$Type' => '<p>The schema type for the events schema.</p>', ], ], 'UnauthorizedException' => [ 'base' => NULL, 'refs' => [], ], 'UpdateDiscovererInput' => [ 'base' => NULL, 'refs' => [], ], 'UpdateRegistryInput' => [ 'base' => NULL, 'refs' => [], ], 'UpdateSchemaInput' => [ 'base' => NULL, 'refs' => [], ], '__boolean' => [ 'base' => NULL, 'refs' => [ 'CreateDiscovererInput$CrossAccount' => '<p>Support discovery of schemas in events sent to the bus from another account. (default: true)</p>', 'UpdateDiscovererInput$CrossAccount' => '<p>Support discovery of schemas in events sent to the bus from another account. (default: true)</p>', 'DiscovererOutput$CrossAccount' => '<p>The Status if the discoverer will discover schemas from events sent from another account.</p>', 'DiscovererSummary$CrossAccount' => '<p>The Status if the discoverer will discover schemas from events sent from another account.</p>', ], ], '__listOfGetDiscoveredSchemaVersionItemInput' => [ 'base' => NULL, 'refs' => [ 'GetDiscoveredSchemaInput$Events' => '<p>An array of strings where each string is a JSON event. These are the events that were used to generate the schema. The array includes a single type of event and has a maximum size of 10 events.</p>', ], ], '__listOfRegistrySummary' => [ 'base' => NULL, 'refs' => [ 'ListRegistriesOutput$Registries' => '<p>An array of registry summaries.</p>', ], ], '__listOfSchemaSummary' => [ 'base' => NULL, 'refs' => [ 'ListSchemasOutput$Schemas' => '<p>An array of schema summaries.</p>', ], ], '__listOfSchemaVersionSummary' => [ 'base' => NULL, 'refs' => [ 'ListSchemaVersionsOutput$SchemaVersions' => '<p>An array of schema version summaries.</p>', ], ], '__listOfSearchSchemaSummary' => [ 'base' => NULL, 'refs' => [ 'SearchSchemasOutput$Schemas' => '<p>An array of SearchSchemaSummary information.</p>', ], ], '__listOfSearchSchemaVersionSummary' => [ 'base' => NULL, 'refs' => [ 'SearchSchemaSummary$SchemaVersions' => '<p>An array of schema version summaries.</p>', ], ], '__long' => [ 'base' => NULL, 'refs' => [ 'SchemaSummary$VersionCount' => '<p>The number of versions available for the schema.</p>', ], ], '__string' => [ 'base' => NULL, 'refs' => [ 'CodeBindingOutput$SchemaVersion' => '<p>The version number of the schema.</p>', 'DescribeSchemaOutput$Content' => '<p>The source of the schema definition.</p>', 'DescribeSchemaOutput$Description' => '<p>The description of the schema.</p>', 'DescribeSchemaOutput$SchemaArn' => '<p>The ARN of the schema.</p>', 'DescribeSchemaOutput$SchemaName' => '<p>The name of the schema.</p>', 'DescribeSchemaOutput$SchemaVersion' => '<p>The version number of the schema</p>', 'DescribeSchemaOutput$Type' => '<p>The type of the schema.</p>', 'DiscovererOutput$Description' => '<p>The description of the discoverer.</p>', 'DiscovererOutput$DiscovererArn' => '<p>The ARN of the discoverer.</p>', 'DiscovererOutput$DiscovererId' => '<p>The ID of the discoverer.</p>', 'DiscovererOutput$SourceArn' => '<p>The ARN of the event bus.</p>', 'DiscovererStateOutput$DiscovererId' => '<p>The ID of the discoverer.</p>', 'DiscovererSummary$DiscovererArn' => '<p>The ARN of the discoverer.</p>', 'DiscovererSummary$DiscovererId' => '<p>The ID of the discoverer.</p>', 'DiscovererSummary$SourceArn' => '<p>The ARN of the event bus.</p>', 'ErrorOutput$Code' => '<p>The error code.</p>', 'ErrorOutput$Message' => '<p>The message string of the error output.</p>', 'ExportSchemaOutput$Content' => '<p>The content of the schema.</p>', 'ExportSchemaOutput$SchemaArn' => '<p>The ARN of the schema to export.</p>', 'ExportSchemaOutput$SchemaName' => '<p>The name of the schema to export.</p>', 'ExportSchemaOutput$SchemaVersion' => '<p>The version of the schema to export.</p>', 'ExportSchemaOutput$Type' => '<p>The type of schema to export.</p>', 'GetDiscoveredSchemaOutput$Content' => '<p>The source of the schema definition.</p>', 'GetResourcePolicyOutput$Policy' => '<p>The resource-based policy.</p>', 'GetResourcePolicyOutput$RevisionId' => '<p>The revision ID.</p>', 'ListDiscoverersOutput$NextToken' => '<p>The token that specifies the next page of results to return. To request the first page, leave NextToken empty. The token will expire in 24 hours, and cannot be shared with other accounts.</p>', 'ListRegistriesOutput$NextToken' => '<p>The token that specifies the next page of results to return. To request the first page, leave NextToken empty. The token will expire in 24 hours, and cannot be shared with other accounts.</p>', 'ListSchemaVersionsOutput$NextToken' => '<p>The token that specifies the next page of results to return. To request the first page, leave NextToken empty. The token will expire in 24 hours, and cannot be shared with other accounts.</p>', 'ListSchemasOutput$NextToken' => '<p>The token that specifies the next page of results to return. To request the first page, leave NextToken empty. The token will expire in 24 hours, and cannot be shared with other accounts.</p>', 'PutResourcePolicyInput$Policy' => '<p>The resource-based policy.</p>', 'PutResourcePolicyInput$RevisionId' => '<p>The revision ID of the policy.</p>', 'PutResourcePolicyOutput$Policy' => '<p>The resource-based policy.</p>', 'PutResourcePolicyOutput$RevisionId' => '<p>The revision ID of the policy.</p>', 'RegistryOutput$Description' => '<p>The description of the registry.</p>', 'RegistryOutput$RegistryArn' => '<p>The ARN of the registry.</p>', 'RegistryOutput$RegistryName' => '<p>The name of the registry.</p>', 'RegistrySummary$RegistryArn' => '<p>The ARN of the registry.</p>', 'RegistrySummary$RegistryName' => '<p>The name of the registry.</p>', 'SchemaOutput$Description' => '<p>The description of the schema.</p>', 'SchemaOutput$SchemaArn' => '<p>The ARN of the schema.</p>', 'SchemaOutput$SchemaName' => '<p>The name of the schema.</p>', 'SchemaOutput$SchemaVersion' => '<p>The version number of the schema</p>', 'SchemaOutput$Type' => '<p>The type of the schema.</p>', 'SchemaSummary$SchemaArn' => '<p>The ARN of the schema.</p>', 'SchemaSummary$SchemaName' => '<p>The name of the schema.</p>', 'SchemaVersionSummary$SchemaArn' => '<p>The ARN of the schema version.</p>', 'SchemaVersionSummary$SchemaName' => '<p>The name of the schema.</p>', 'SchemaVersionSummary$SchemaVersion' => '<p>The version number of the schema.</p>', 'SearchSchemaSummary$RegistryName' => '<p>The name of the registry.</p>', 'SearchSchemaSummary$SchemaArn' => '<p>The ARN of the schema.</p>', 'SearchSchemaSummary$SchemaName' => '<p>The name of the schema.</p>', 'SearchSchemaVersionSummary$SchemaVersion' => '<p>The version number of the schema</p>', 'SearchSchemasOutput$NextToken' => '<p>The token that specifies the next page of results to return. To request the first page, leave NextToken empty. The token will expire in 24 hours, and cannot be shared with other accounts.</p>', 'Tags$member' => NULL, ], ], '__stringMin0Max256' => [ 'base' => NULL, 'refs' => [ 'CreateDiscovererInput$Description' => '<p>A description for the discoverer.</p>', 'CreateRegistryInput$Description' => '<p>A description of the registry to be created.</p>', 'CreateSchemaInput$Description' => '<p>A description of the schema.</p>', 'UpdateDiscovererInput$Description' => '<p>The description of the discoverer to update.</p>', 'UpdateRegistryInput$Description' => '<p>The description of the registry to update.</p>', 'UpdateSchemaInput$Description' => '<p>The description of the schema.</p>', ], ], '__stringMin0Max36' => [ 'base' => NULL, 'refs' => [ 'UpdateSchemaInput$ClientTokenId' => '<p>The ID of the client token.</p>', ], ], '__stringMin1Max100000' => [ 'base' => NULL, 'refs' => [ 'CreateSchemaInput$Content' => '<p>The source of the schema definition.</p>', 'UpdateSchemaInput$Content' => '<p>The source of the schema definition.</p>', ], ], '__stringMin20Max1600' => [ 'base' => NULL, 'refs' => [ 'CreateDiscovererInput$SourceArn' => '<p>The ARN of the event bus.</p>', ], ], '__timestampIso8601' => [ 'base' => NULL, 'refs' => [ 'CodeBindingOutput$CreationDate' => '<p>The time and date that the code binding was created.</p>', 'CodeBindingOutput$LastModified' => '<p>The date and time that code bindings were modified.</p>', 'DescribeSchemaOutput$LastModified' => '<p>The date and time that schema was modified.</p>', 'DescribeSchemaOutput$VersionCreatedDate' => '<p>The date the schema version was created.</p>', 'SchemaOutput$LastModified' => '<p>The date and time that schema was modified.</p>', 'SchemaOutput$VersionCreatedDate' => '<p>The date the schema version was created.</p>', 'SchemaSummary$LastModified' => '<p>The date and time that schema was modified.</p>', 'SearchSchemaVersionSummary$CreatedDate' => '<p>The date the schema version was created.</p>', ], ], ],];
