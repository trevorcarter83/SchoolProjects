USE [BearRiverSmartCareProd]
GO

/****** Object:  Table [dbo].[NewHireForm]    Script Date: 5/10/2018 6:58:13 AM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[NewHireForm](
	[NewHireFormID] [int] IDENTITY(1,1) NOT NULL,
	[StaffID] [int] NULL,
	[ClinicalSupervisor] [varchar](50) NULL,
	[LocationID] [int] NULL,
	[NoComputerAccess] [bit] NULL,
	[DrivingCenterVehicles] [bit] NULL,
	[BenefitsEligible] [bit] NULL,
	[CellPhoneStartDate] [date] NULL,
	[CellPhoneAmount] [varchar](50) NULL,
	[OtherConsiderations] [varchar](500) NULL,
	[SupervisorID] [int] NULL,
	[FormSubmissionDate] [date] NULL,
	[HRDateProcessed] [date] NULL,
	[HRAdminSupervisorID] [int] NULL,
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
	[HRAddedToReliasLearning] [bit] NULL,
	[HRHourlyWage] [decimal](10, 2) NULL,
	[HRMonthly] [decimal](10, 2) NULL,
	[HRYearly] [decimal](10, 2) NULL,
	[HRStipendType] [varchar](50) NULL,
	[HRStipendHourly] [decimal](10, 2) NULL,
	[HRStipendMonthly] [decimal](10, 2) NULL,
	[HRStipendYearly] [decimal](10, 2) NULL,
	[HRInsuranceStipendMonthly] [decimal](10, 2) NULL,
	[Replacing] [varchar](50) NULL,
	[EmployeeName] [varchar](50) NULL,
	[SupervisorApproved] [bit] NULL,
	[HRApproved] [bit] NULL,
	[PositionID] [int] NULL,
	[StartDate] [date] NULL,
	[FTE] [decimal](10, 2) NULL,
PRIMARY KEY CLUSTERED 
(
	[NewHireFormID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[NewHireForm] ADD  DEFAULT (CONVERT([date],getdate())) FOR [FormSubmissionDate]
GO

ALTER TABLE [dbo].[NewHireForm]  WITH CHECK ADD FOREIGN KEY([HRAdminSupervisorID])
REFERENCES [dbo].[Supervisor] ([SupervisorID])
GO

ALTER TABLE [dbo].[NewHireForm]  WITH CHECK ADD FOREIGN KEY([LocationID])
REFERENCES [dbo].[Location] ([LocationID])
GO

ALTER TABLE [dbo].[NewHireForm]  WITH CHECK ADD FOREIGN KEY([PositionID])
REFERENCES [dbo].[Position] ([PositionID])
GO

ALTER TABLE [dbo].[NewHireForm]  WITH CHECK ADD FOREIGN KEY([StaffID])
REFERENCES [dbo].[Staff] ([StaffId])
GO

ALTER TABLE [dbo].[NewHireForm]  WITH CHECK ADD FOREIGN KEY([StaffID])
REFERENCES [dbo].[Staff] ([StaffId])
GO

ALTER TABLE [dbo].[NewHireForm]  WITH CHECK ADD FOREIGN KEY([SupervisorID])
REFERENCES [dbo].[Supervisor] ([SupervisorID])
GO


