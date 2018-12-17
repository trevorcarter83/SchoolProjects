USE [BearRiverSmartCareProd]
GO

/****** Object:  Table [dbo].[PaidTimeOffForm]    Script Date: 5/10/2018 6:58:44 AM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[PaidTimeOffForm](
	[PaidTimeOffFormID] [int] IDENTITY(1,1) NOT NULL,
	[EmployeeID] [int] NOT NULL,
	[FormTimestamp] [datetime] NOT NULL,
	[Initial] [varchar](3) NULL,
	[HoursOfLeave] [int] NULL,
	[StartDate] [date] NULL,
	[EndDate] [date] NULL,
	[AdditionalHours] [int] NULL,
	[EmployeeSignature] [varchar](50) NULL,
	[SupervisorSignature] [varchar](50) NULL,
	[PayrollSignature] [varchar](50) NULL,
	[EmployeeSignatureDate] [date] NULL,
	[SupervisorSignatureDate] [date] NULL,
	[PayrollSignatureDate] [date] NULL,
	[HRHours] [int] NULL,
	[HRAmountPerHour] [decimal](10, 2) NULL,
	[HRDatePaid] [date] NULL,
	[HRPaidBy] [varchar](50) NULL,
	[HRAdjustmentDate] [date] NULL,
	[EmployeeName] [varchar](50) NULL,
	[SupervisorApproved] [bit] NULL,
	[HRApproved] [bit] NULL,
	[SupervisorID] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[PaidTimeOffFormID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[PaidTimeOffForm] ADD  DEFAULT (getdate()) FOR [FormTimestamp]
GO

ALTER TABLE [dbo].[PaidTimeOffForm]  WITH CHECK ADD FOREIGN KEY([EmployeeID])
REFERENCES [dbo].[Staff] ([StaffId])
GO

ALTER TABLE [dbo].[PaidTimeOffForm]  WITH CHECK ADD FOREIGN KEY([EmployeeID])
REFERENCES [dbo].[Staff] ([StaffId])
GO

ALTER TABLE [dbo].[PaidTimeOffForm]  WITH CHECK ADD FOREIGN KEY([SupervisorID])
REFERENCES [dbo].[Supervisor] ([SupervisorID])
GO


