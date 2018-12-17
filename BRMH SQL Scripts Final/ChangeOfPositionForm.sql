USE [BearRiverSmartCareProd]
GO

/****** Object:  Table [dbo].[ChangeOfPositionForm]    Script Date: 5/10/2018 6:56:45 AM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[ChangeOfPositionForm](
	[ChangeOfPositionFormID] [int] IDENTITY(1,1) NOT NULL,
	[StaffID] [int] NOT NULL,
	[FormTimestamp] [datetime] NULL,
	[FTEChange] [bit] NULL,
	[PositionChange] [bit] NULL,
	[ReceivedClinicalLicense] [bit] NULL,
	[FTEChangeNew] [int] NULL,
	[PositionChangeNew] [int] NULL,
	[PositionChangeReplacing] [varchar](50) NULL,
	[PositionChangeClinicalSupervisor] [varchar](50) NULL,
	[ClinicalLicenseEffectiveDate] [date] NULL,
	[CellPhoneStartDate] [date] NULL,
	[CellPhoneEndDate] [date] NULL,
	[CellPhoneAmount] [varchar](50) NULL,
	[OtherConsiderations] [varchar](500) NULL,
	[SupervisorID] [int] NULL,
	[HRExperienceGiven] [int] NULL,
	[HRNotifiedAppropriateStaff] [bit] NULL,
	[HRAddedToWorkerFiles] [bit] NULL,
	[HRBenefits] [bit] NULL,
	[HRAddedToNewLeaveSystem] [bit] NULL,
	[HRPayrollCardDrafted] [bit] NULL,
	[HRCostCenterAdded] [bit] NULL,
	[HRNewJobDescription] [bit] NULL,
	[HRAPNotifiedOfCellPhoneReimbursement] [bit] NULL,
	[HRBeginReceivingStaffDevelopment] [bit] NULL,
	[HRHourlyWage] [decimal](10, 2) NULL,
	[HRMonthly] [decimal](10, 2) NULL,
	[HRYearly] [decimal](10, 2) NULL,
	[HRStipendType] [varchar](50) NULL,
	[HRStipendHourly] [decimal](10, 2) NULL,
	[HRStipendMonthly] [decimal](10, 2) NULL,
	[HRStipendYearly] [decimal](10, 2) NULL,
	[HRInsuranceStipendMonthly] [decimal](10, 2) NULL,
	[EmployeeName] [varchar](50) NULL,
	[SupervisorApproved] [bit] NULL,
	[HRApproved] [bit] NULL,
	[EffectiveDate] [date] NULL,
PRIMARY KEY CLUSTERED 
(
	[ChangeOfPositionFormID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[ChangeOfPositionForm] ADD  DEFAULT (getdate()) FOR [FormTimestamp]
GO

ALTER TABLE [dbo].[ChangeOfPositionForm]  WITH CHECK ADD FOREIGN KEY([PositionChangeNew])
REFERENCES [dbo].[Position] ([PositionID])
GO

ALTER TABLE [dbo].[ChangeOfPositionForm]  WITH CHECK ADD FOREIGN KEY([StaffID])
REFERENCES [dbo].[Staff] ([StaffId])
GO

ALTER TABLE [dbo].[ChangeOfPositionForm]  WITH CHECK ADD FOREIGN KEY([StaffID])
REFERENCES [dbo].[Staff] ([StaffId])
GO

ALTER TABLE [dbo].[ChangeOfPositionForm]  WITH CHECK ADD FOREIGN KEY([SupervisorID])
REFERENCES [dbo].[Supervisor] ([SupervisorID])
GO


