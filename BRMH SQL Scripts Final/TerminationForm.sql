USE [BearRiverSmartCareProd]
GO

/****** Object:  Table [dbo].[TerminationForm]    Script Date: 5/10/2018 7:00:34 AM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[TerminationForm](
	[TerminationFormID] [int] IDENTITY(1,1) NOT NULL,
	[StaffID] [int] NULL,
	[LastDay] [date] NULL,
	[BeenProvidedWithLeavingUsForm] [bit] NULL,
	[BeenDirectedToAccountantForBenefitsForm] [bit] NULL,
	[SupervisorProvidedHRInstructionOnReplacement] [bit] NULL,
	[SupervisorReviewingOustandingDocumentation] [bit] NULL,
	[OtherConsideration] [varchar](500) NULL,
	[SupervisorID] [int] NULL,
	[HRNotifiedAppropriateStaff] [bit] NULL,
	[HRAddedToWorkerFiles] [bit] NULL,
	[HRCloseOutLeaveSystem] [bit] NULL,
	[HRPayrollCardDrafted] [bit] NULL,
	[HRTerminateReliasLearning] [bit] NULL,
	[HRSentAPEmail] [bit] NULL,
	[HRPersonnelFile] [bit] NULL,
	[HRPRCards] [bit] NULL,
	[EmployeeName] [varchar](50) NULL,
	[SupervisorApproved] [bit] NULL,
	[HRApproved] [bit] NULL,
	[PositionID] [int] NULL,
	[DateSubmitted] [date] NULL,
PRIMARY KEY CLUSTERED 
(
	[TerminationFormID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[TerminationForm]  WITH CHECK ADD FOREIGN KEY([PositionID])
REFERENCES [dbo].[Position] ([PositionID])
GO

ALTER TABLE [dbo].[TerminationForm]  WITH CHECK ADD FOREIGN KEY([StaffID])
REFERENCES [dbo].[Staff] ([StaffId])
GO

ALTER TABLE [dbo].[TerminationForm]  WITH CHECK ADD FOREIGN KEY([StaffID])
REFERENCES [dbo].[Staff] ([StaffId])
GO

ALTER TABLE [dbo].[TerminationForm]  WITH CHECK ADD FOREIGN KEY([SupervisorID])
REFERENCES [dbo].[Supervisor] ([SupervisorID])
GO


