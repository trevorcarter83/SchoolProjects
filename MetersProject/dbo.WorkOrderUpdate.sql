ALTER PROCEDURE [dbo].[WorkOrderUpdate]
	@WorkOrderID INT
	,@CurrentStatus VARCHAR(50)
	,@ProposedDate DATE
	,@ScheduledDate DATE
AS
	BEGIN

	SELECT
		CASE
			WHEN @CurrentStatus = x.CurrentStatus
			THEN 0
			ELSE 1
		END				[CSValid]
		,@CurrentStatus	[NewValue]
		,x.CurrentStatus [OldValue]
	INTO
		#CS
	FROM
		MetersWorkOrders.dbo.WorkOrder x
	WHERE
		x.WorkOrderID = @WorkOrderID
	
	--============================
	DECLARE
		@Stts INT = (SELECT TOP 1 CSValid FROM #CS)

	IF (@Stts = 1)
		BEGIN
			BEGIN
			UPDATE WorkOrder
			SET CurrentStatus = @CurrentStatus
			WHERE WorkOrderID = @WorkOrderID
			END
			BEGIN
			INSERT INTO WorkOrderHistory
			(WorkOrderID,ColumnChanged,OldValue,NewValue,Timestamp)
			SELECT 
				@WorkOrderID
				,'CurrentStatus'
				,OldValue
				,NewValue
				,GETDATE()
			FROM
				#CS
			END
		END

	--===============================
	SELECT
		CASE
			WHEN @ProposedDate = x.ProposedDate
			THEN 0
			ELSE 1
		END				[CSValid]
		,@ProposedDate	[NewValue]
		,x.ProposedDate [OldValue]
	INTO
		#PD
	FROM
		MetersWorkOrders.dbo.WorkOrder x
	WHERE
		x.WorkOrderID = @WorkOrderID
	
	--============================
	DECLARE
		@Prdt INT = (SELECT TOP 1 CSValid FROM #PD)

	IF (@Prdt = 1)
		BEGIN
			BEGIN
			UPDATE WorkOrder
			SET ProposedDate = @ProposedDate
			WHERE WorkOrderID = @WorkOrderID
			END 
			BEGIN
			INSERT INTO WorkOrderHistory
			(WorkOrderID,ColumnChanged,OldValue,NewValue,Timestamp)
			SELECT 
				@WorkOrderID
				,'ProposedDate'
				,OldValue
				,NewValue
				,GETDATE()
			FROM
				#PD
			END
		END

	--===============================
	SELECT
		CASE
			WHEN @ScheduledDate = x.ScheduledDate
			THEN 0
			ELSE 1
		END				[CSValid]
		,@ScheduledDate	[NewValue]
		,x.ScheduledDate [OldValue]
	INTO
		#SD
	FROM
		MetersWorkOrders.dbo.WorkOrder x
	WHERE
		x.WorkOrderID = @WorkOrderID
	
	--============================
	DECLARE
		@Sch INT = (SELECT TOP 1 CSValid FROM #SD)

	IF (@Sch = 1)
		BEGIN
			BEGIN
			UPDATE WorkOrder
			SET ScheduledDate = @ScheduledDate
			WHERE WorkOrderID = @WorkOrderID
			END 
			BEGIN
			INSERT INTO WorkOrderHistory
			(WorkOrderID,ColumnChanged,OldValue,NewValue,Timestamp)
			SELECT 
				@WorkOrderID
				,'ScheduledDate'
				,OldValue
				,NewValue
				,GETDATE()
			FROM
				#SD
			END
		END

	--===============================
	DROP TABLE
		#CS
		,#PD
		,#SD
	END
RETURN 0