// Single Tag Item Example
[
	{
        "tagName": "Header", // Class Name (Have to be an element of Enum TagList)
		"position": 0, // (Optional) Position of Tag in List. Have to be greater of equal to 0
		"input": // (Optional) Attribute list of tag shown in HTML open tag
		{
			"tagID": "PageHeader", // Tag ID for referenzing in the php code
			"id": "PageHeader", // Tag ID for referenzing in the html code
				// "tagID" will not be shown in HTML output, "id" will
				// If only "id" is defined, "tagID" will be set automatically to "id"
				// If only "tagID" is defined, "id" won't be set
				// Use both if different ID names are needed
            "class": "topbar",
				// ... All possible html tag attributes, depending on tag type.
				// A complete list can be found with static method TagInformation::listTagInfos(TagListType::JSON)

			"events": // Events only in body and children tags
			{
				 // (name_xxx) Only properties from JavaScriptEventDTO & JavaScriptBodyEventDTO allowed
				"name1": "value1",
				"name2": "value2"
			},
			"data": // Data only in body and children tags
			{
				// Every (name_xxx) will be added by data-*
				"name1": "value1",
				"name2": "value2"
			}
		}
	}
]
// Multiple Tag Item Example
[
	{
		"tagName": "Header",
		"input":
		{
			"id": "PageHeader",
            "class": "topbar"
		}
	},
	{
		"tagName": "Main",
		"input":
		{
			"tagID": "PageMain",
			"id": "MainArea",
            "class": "dark-bg"
		}
	},
	{
		"tagName": "Footer",
		"input":
		{
			"tagID": "PageFooter"	
		}
	}
]
// Nested Tag Item Example
[
	{
		"tagName": "Main",
		"input":
		{
			"tagID": "PageMain"	
		},
		"innerContent": // Nested Tag Items & Tag Content
		[
			{
				"tagName": "Nav",
				"input":
				{
					"tagID": "PageNavigation"
				},
				"innerContent":
				[
					{
						"tagName": "Div",
						"input":
						{
							"tagID": "Div1"	
						}
					}
				]
			}
		]
	}
]
// Single Tag Content Example
[
	{
		"innerContent":
		[
			{
				"content": "Header", // Content of Parent Tag Item
				"position": 0 // (Optional) Position of Tag in List. Have to be greater of equal to 0
			}
		]
	}
]
// Multiple Tag Content Example
[
	{
		"innerContent":
		[
			{
				"content": "Two"
			}
		]
	},
	{
		"innerContent":
		[
			{
				"content": "One ",
				"position": 0 // Set position of Content to first position in List (Output: "One Two")
			}
		]
	}
]
// Nested Tag Item & Tag Content Example
[
	{
		"tagName": "Main",
		"input":
		{
			"tagID": "PageMain"	
		},
		"innerContent":
		[
			{
				"tagName": "H1",
				"input":
				{
					"tagID": "H1"
				},
				"innerContent":
				[
					{
						"content": "First H1 Header"
					}
				]
			},
			{
				"tagName": "Nav",
				"input":
				{
					"tagID": "PageNavigation"
				},
				"innerContent":
				[
					{
						"tagName": "Div",
						"input":
						{
							"tagID": "Div1"
						},
						"innerContent":
						[
							{
								"content": "Ouput 1"
							},
							{
								"tagName": "Div",
								"input":
								{
									"tagID": "Div2"
								},
								"innerContent":
								[
									{
										"content": "Ouput 2"
									},
									{
										"tagName": "Div",
										"input":
										{
											"tagID": "Div3"
										},
										"innerContent":
										[
											{
												"content": "Ouput 3"
											}
										]
									}
								]
							},
							{
								"content": "Output 4"
							}
						]
					}
				]
			}
		]
	}
]